<?php

namespace App\Services\FactorMaker;

use App\Models\CourseInstallment;
use App\Models\Factor;
use App\Services\FactorMaker\BaseFactorMaker as FactorMaker;
use Morilog\Jalali\Jalalian;

class UserCourseInstallment extends FactorMaker
{
    public function __construct(public CourseInstallment $courseInstallment)
    {
        if ($courseInstallment->billable()->exists())
            $this->deleteRegisteredFactors();
    }

    public function makeFactors(): array
    {
        $factors = [];
        $factors = array_merge($factors, $this->makeDuringCourseFactors());
        $factors = array_merge($factors, $this->makeAfterCourseFactors());
        return $factors;
    }

    /**
     * @return array of factors
     */
    protected function makeDuringCourseFactors(): array
    {
        $factors = [];
        for ($i = 1; $i <= $this->courseInstallment->during_course_installment_count; $i++) {
            $du_date = Jalalian::fromCarbon($this->courseInstallment->courseStudent->course->start_date)
                ->addMonths($i)->subMonths()->toCarbon();
            $factors[] =
                $this->makeFactor(
                    $this->courseInstallment,
                    $this->courseInstallment->during_course_installment_amount,
                    $du_date,
                    __('During Course Installment No.') . $i);
        }
        return array_filter($factors);
    }

    /**
     * @return array of factors
     */
    protected function makeAfterCourseFactors(): array
    {
        $factors = [];
        for ($i = 1; $i <= $this->courseInstallment->after_course_installment_count; $i++) {
            $du_date = Jalalian::fromCarbon($this->courseInstallment->after_course_installment_start)
                ->addMonths($i)->subMonths()->toCarbon();
            $factors[] =
                $this->makeFactor(
                    $this->courseInstallment,
                    $this->courseInstallment->after_course_installment_amount,
                    $du_date,
                    __('After Course Installment No.') . $i);
        }
        return array_filter($factors);
    }

    protected function deleteRegisteredFactors(): int
    {
        $bill_ids = [];
        $bills = $this->courseInstallment->billable;
        foreach ($bills as $factor) {
            $bill_ids[] = $this->isNotPaidFactor($factor) ? $factor->id : null;
        }
        array_filter($bill_ids);
        return $this->courseInstallment->billable()->delete($bill_ids);
    }

    protected function isNotPaidFactor(Factor $factor): bool
    {
        return $factor->amount_paid === 0;
    }

}

<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\AdminData
 *
 * @property int $id
 * @property int $user_id
 * @property string $work_position
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|AdminData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminData query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminData whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminData whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminData whereWorkPosition($value)
 */
	class AdminData extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AppExperienceData
 *
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int $id
 * @property int $user_data_id
 * @property string $app_name
 * @property int $history
 * @property mixed $proficiency
 * @property int $project
 * @property string $consideration
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\UserData $userData
 * @method static \Illuminate\Database\Eloquent\Builder|AppExperienceData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppExperienceData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppExperienceData onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AppExperienceData query()
 * @method static \Illuminate\Database\Eloquent\Builder|AppExperienceData whereAppName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppExperienceData whereConsideration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppExperienceData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppExperienceData whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppExperienceData whereHistory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppExperienceData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppExperienceData whereProficiency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppExperienceData whereProject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppExperienceData whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppExperienceData whereUserDataId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppExperienceData withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AppExperienceData withoutTrashed()
 */
	class AppExperienceData extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property int $topic_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Course> $courses
 * @property-read int|null $courses_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Category> $subcategories
 * @property-read int|null $subcategories_count
 * @property-read Category $topic
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereTopicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Classroom
 *
 * @property int $id
 * @property string $name
 * @property int $capacity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Course> $courses
 * @property-read int|null $courses_count
 * @method static \Illuminate\Database\Eloquent\Builder|Classroom newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Classroom newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Classroom query()
 * @method static \Illuminate\Database\Eloquent\Builder|Classroom whereCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Classroom whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Classroom whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Classroom whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Classroom whereUpdatedAt($value)
 */
	class Classroom extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Config
 *
 * @property int $key
 * @property string $value
 * @method static \Illuminate\Database\Eloquent\Builder|Config newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Config newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Config query()
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereValue($value)
 */
	class Config extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Course
 *
 * @property int $id
 * @property int $sub_category_id
 * @property int $course_number
 * @property int $mentor_id
 * @property int $student_count
 * @property string $start_date
 * @property string $end_date
 * @property string $start_time
 * @property string $end_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Classroom> $classrooms
 * @property-read int|null $classrooms_count
 * @property-read \App\Models\User $mentor
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $students
 * @property-read int|null $students_count
 * @method static \Illuminate\Database\Eloquent\Builder|Course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Course newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Course query()
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCourseNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereMentorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereStudentCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereSubCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereUpdatedAt($value)
 */
	class Course extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CourseData
 *
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int $id
 * @property int $user_data_id
 * @property string $title
 * @property string $start_date
 * @property float $course_length
 * @property string $academy_name
 * @property string $description
 * @property int $evidence
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\UserData $userData
 * @method static \Illuminate\Database\Eloquent\Builder|CourseData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseData onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseData query()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseData whereAcademyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseData whereCourseLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseData whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseData whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseData whereEvidence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseData whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseData whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseData whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseData whereUserDataId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseData withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseData withoutTrashed()
 */
	class CourseData extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CourseInstallment
 *
 * @property int $id
 * @property int $course_student_id
 * @property int $tuition
 * @property int $during_course_installment_count
 * @property int $during_course_installment_amount
 * @property int $after_course_installment_count
 * @property int $after_course_installment_amount
 * @property string $after_course_installment_start
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CourseStudent $courseStudent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Factor> $factors
 * @property-read int|null $factors_count
 * @method static \Illuminate\Database\Eloquent\Builder|CourseInstallment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseInstallment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseInstallment query()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseInstallment whereAfterCourseInstallmentAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseInstallment whereAfterCourseInstallmentCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseInstallment whereAfterCourseInstallmentStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseInstallment whereCourseStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseInstallment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseInstallment whereDuringCourseInstallmentAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseInstallment whereDuringCourseInstallmentCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseInstallment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseInstallment whereTuition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseInstallment whereUpdatedAt($value)
 */
	class CourseInstallment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CourseStudent
 *
 * @property int $id
 * @property int $student_id
 * @property int $course_id
 * @property mixed $student_status
 * @property int $is_supplement
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $installment_data_id
 * @property-read \App\Models\Course $course
 * @property-read \App\Models\CourseInstallment|null $courseInstallment
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\LeaveRequest> $leaveRequests
 * @property-read int|null $leave_requests_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\MentorWeeklyStudentScore> $mentorWeeklyStudentScore
 * @property-read int|null $mentor_weekly_student_score_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Report> $reports
 * @property-read int|null $reports_count
 * @property-read \App\Models\User $student
 * @method static \Illuminate\Database\Eloquent\Builder|CourseStudent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseStudent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseStudent query()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseStudent whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseStudent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseStudent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseStudent whereInstallmentDataId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseStudent whereIsSupplement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseStudent whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseStudent whereStudentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseStudent whereUpdatedAt($value)
 */
	class CourseStudent extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EducationData
 *
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int $id
 * @property int $user_data_id
 * @property object|null $diploma
 * @property object|null $associate_degree
 * @property object|null $bachelor_degree
 * @property object|null $master_degree
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\UserData $userData
 * @method static \Illuminate\Database\Eloquent\Builder|EducationData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EducationData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EducationData onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|EducationData query()
 * @method static \Illuminate\Database\Eloquent\Builder|EducationData whereAssociateDegree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationData whereBachelorDegree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationData whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationData whereDiploma($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationData whereMasterDegree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationData whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationData whereUserDataId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationData withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|EducationData withoutTrashed()
 */
	class EducationData extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Factor
 *
 * @property int $id
 * @property int|null $course_installments_id
 * @property int|null $user_id
 * @property int $total_amount
 * @property int $amount_paid
 * @property string $status
 * @property \Illuminate\Support\Carbon $du_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CourseInstallment|null $courseInstallment
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Transaction> $transactions
 * @property-read int|null $transactions_count
 * @method static \Illuminate\Database\Eloquent\Builder|Factor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Factor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Factor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Factor whereAmountPaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factor whereCourseInstallmentsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factor whereDuDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factor whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factor whereTotalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factor whereUserId($value)
 */
	class Factor extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ForeignLanguagesData
 *
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int $id
 * @property int $user_data_id
 * @property mixed $languages_name
 * @property mixed $read
 * @property mixed $write
 * @property mixed $conversation
 * @property mixed $comprehension
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\UserData $userData
 * @method static \Illuminate\Database\Eloquent\Builder|ForeignLanguagesData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ForeignLanguagesData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ForeignLanguagesData onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ForeignLanguagesData query()
 * @method static \Illuminate\Database\Eloquent\Builder|ForeignLanguagesData whereComprehension($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForeignLanguagesData whereConversation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForeignLanguagesData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForeignLanguagesData whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForeignLanguagesData whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForeignLanguagesData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForeignLanguagesData whereLanguagesName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForeignLanguagesData whereRead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForeignLanguagesData whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForeignLanguagesData whereUserDataId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForeignLanguagesData whereWrite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForeignLanguagesData withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ForeignLanguagesData withoutTrashed()
 */
	class ForeignLanguagesData extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\HomeData
 *
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int $id
 * @property int $user_data_id
 * @property string $address
 * @property string $home_tel
 * @property string $postal_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\UserData $userData
 * @method static \Illuminate\Database\Eloquent\Builder|HomeData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HomeData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HomeData onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|HomeData query()
 * @method static \Illuminate\Database\Eloquent\Builder|HomeData whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeData whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeData whereHomeTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeData wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeData whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeData whereUserDataId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeData withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|HomeData withoutTrashed()
 */
	class HomeData extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\LeaveRequest
 *
 * @property int $id
 * @property int $course_student_id
 * @property mixed $status
 * @property string $requested_date
 * @property string $start_time
 * @property string $requested_time
 * @property string $description
 * @property string $admin_comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CourseStudent $courseStudent
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveRequest whereAdminComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveRequest whereCourseStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveRequest whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveRequest whereRequestedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveRequest whereRequestedTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveRequest whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveRequest whereUpdatedAt($value)
 */
	class LeaveRequest extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MentorData
 *
 * @property int $id
 * @property int $user_id
 * @property string $work_address
 * @property int $education_degree_id
 * @property string $education_degree_university
 * @property string $representative
 * @property string $skills
 * @property string $work_experience
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|MentorData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MentorData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MentorData query()
 * @method static \Illuminate\Database\Eloquent\Builder|MentorData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MentorData whereEducationDegreeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MentorData whereEducationDegreeUniversity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MentorData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MentorData whereRepresentative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MentorData whereSkills($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MentorData whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MentorData whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MentorData whereWorkAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MentorData whereWorkExperience($value)
 */
	class MentorData extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MentorWeeklyStudentScore
 *
 * @property int $id
 * @property int $course_student_id
 * @property int $technical_score
 * @property int $week_number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CourseStudent $courseStudent
 * @method static \Illuminate\Database\Eloquent\Builder|MentorWeeklyStudentScore newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MentorWeeklyStudentScore newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MentorWeeklyStudentScore query()
 * @method static \Illuminate\Database\Eloquent\Builder|MentorWeeklyStudentScore whereCourseStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MentorWeeklyStudentScore whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MentorWeeklyStudentScore whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MentorWeeklyStudentScore whereTechnicalScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MentorWeeklyStudentScore whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MentorWeeklyStudentScore whereWeekNumber($value)
 */
	class MentorWeeklyStudentScore extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MilitaryServiceData
 *
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int $id
 * @property int $user_data_id
 * @property mixed $service_status
 * @property string|null $service_address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\UserData $userData
 * @method static \Illuminate\Database\Eloquent\Builder|MilitaryServiceData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MilitaryServiceData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MilitaryServiceData onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|MilitaryServiceData query()
 * @method static \Illuminate\Database\Eloquent\Builder|MilitaryServiceData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MilitaryServiceData whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MilitaryServiceData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MilitaryServiceData whereServiceAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MilitaryServiceData whereServiceStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MilitaryServiceData whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MilitaryServiceData whereUserDataId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MilitaryServiceData withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|MilitaryServiceData withoutTrashed()
 */
	class MilitaryServiceData extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PerformanceOverview
 *
 * @property int $id
 * @property int $course_student_id
 * @property string $start_date
 * @property string $end_date
 * @property int $technical_score
 * @property int $attendance_score
 * @property int $reporting_score
 * @property int $system_compatibility
 * @property string $admin_comment
 * @property string $mentor_comment
 * @property int $is_visible_for_user
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|PerformanceOverview newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PerformanceOverview newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PerformanceOverview query()
 * @method static \Illuminate\Database\Eloquent\Builder|PerformanceOverview whereAdminComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerformanceOverview whereAttendanceScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerformanceOverview whereCourseStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerformanceOverview whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerformanceOverview whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerformanceOverview whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerformanceOverview whereIsVisibleForUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerformanceOverview whereMentorComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerformanceOverview whereReportingScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerformanceOverview whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerformanceOverview whereSystemCompatibility($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerformanceOverview whereTechnicalScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PerformanceOverview whereUpdatedAt($value)
 */
	class PerformanceOverview extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PersonalData
 *
 * @property int $id
 * @property int $user_data_id
 * @property string $birth_place
 * @property string $birth_date
 * @property string $religion
 * @property string $gender
 * @property int $is_married
 * @property int|null $child_count
 * @property mixed $mbti
 * @property string $parent_phone_number
 * @property string $emergency_phone_number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\UserData $userData
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalData query()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalData whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalData whereBirthPlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalData whereChildCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalData whereEmergencyPhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalData whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalData whereIsMarried($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalData whereMbti($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalData whereParentPhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalData whereReligion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalData whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalData whereUserDataId($value)
 */
	class PersonalData extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Report
 *
 * @property int $id
 * @property int $course_student_id
 * @property string $date
 * @property string $admin_comment
 * @property string $mentor_comment
 * @property mixed $overall_status
 * @property mixed $time_status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CourseStudent $courseStudent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SubReport> $subReports
 * @property-read int|null $sub_reports_count
 * @method static \Illuminate\Database\Eloquent\Builder|Report newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Report newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Report query()
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereAdminComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereCourseStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereMentorComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereOverallStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereTimeStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereUpdatedAt($value)
 */
	class Report extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RepresentativeData
 *
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int $id
 * @property int $user_data_id
 * @property string $name
 * @property int $acquaintance_duration
 * @property string $relation
 * @property string $info
 * @property mixed $introduction_method
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\UserData $userData
 * @method static \Illuminate\Database\Eloquent\Builder|RepresentativeData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RepresentativeData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RepresentativeData onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|RepresentativeData query()
 * @method static \Illuminate\Database\Eloquent\Builder|RepresentativeData whereAcquaintanceDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RepresentativeData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RepresentativeData whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RepresentativeData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RepresentativeData whereInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RepresentativeData whereIntroductionMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RepresentativeData whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RepresentativeData whereRelation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RepresentativeData whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RepresentativeData whereUserDataId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RepresentativeData withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|RepresentativeData withoutTrashed()
 */
	class RepresentativeData extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SubReport
 *
 * @property int $id
 * @property int $report_id
 * @property string $base_time
 * @property string $edited_time
 * @property string $explanation
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Report $report
 * @method static \Illuminate\Database\Eloquent\Builder|SubReport newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubReport newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubReport query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubReport whereBaseTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubReport whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubReport whereEditedTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubReport whereExplanation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubReport whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubReport whereReportId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubReport whereUpdatedAt($value)
 */
	class SubReport extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Transaction
 *
 * @property-read \App\Models\Factor|null $factor
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction query()
 */
	class Transaction extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $father_name
 * @property string|null $phone_number
 * @property string|null $national_id
 * @property string|null $email
 * @property mixed|null $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\AdminData|null $adminData
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CourseStudent> $courseStudent
 * @property-read int|null $course_student_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Course> $courses
 * @property-read int|null $courses_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\MentorData|null $teacherData
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Course> $teachingCourses
 * @property-read int|null $teaching_courses_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \App\Models\UserData|null $userData
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFatherName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNationalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutTrashed()
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserData
 *
 * @property int $id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $personal_data_id
 * @property int|null $home_data_id
 * @property int|null $military_service_data_id
 * @property int|null $education_data_id
 * @property array|null $course_data_id
 * @property array|null $app_experience_data_id
 * @property int|null $foreign_languages_data_id
 * @property int|null $representative_data_id
 * @property-read \App\Models\AppExperienceData|null $appExperienceData
 * @property-read \App\Models\CourseData|null $courseData
 * @property-read \App\Models\EducationData|null $educationData
 * @property-read \App\Models\ForeignLanguagesData|null $foreignLanguagesData
 * @property-read \App\Models\HomeData|null $homeData
 * @property-read \App\Models\MilitaryServiceData|null $militaryServiceData
 * @property-read \App\Models\PersonalData|null $personalData
 * @property-read \App\Models\RepresentativeData|null $representativeData
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserData query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereAppExperienceDataId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereCourseDataId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereEducationDataId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereForeignLanguagesDataId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereHomeDataId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereMilitaryServiceDataId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData wherePersonalDataId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereRepresentativeDataId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserData whereUserId($value)
 */
	class UserData extends \Eloquent {}
}


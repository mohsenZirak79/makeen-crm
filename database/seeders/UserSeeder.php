<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserData;
use App\Models\PersonalData;
use App\Models\HomeData;
use App\Models\MilitaryServiceData;
use App\Models\EducationData;
use App\Models\CourseData;
use App\Models\AppExperienceData;
use App\Models\ForeignLanguagesData;
use App\Models\RepresentativeData;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //student
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            $user = User::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'father_name' => $faker->firstNameMale,
                'phone_number' => $faker->phoneNumber,
                'national_id' => $faker->randomNumber(9, true),
                'email' => $faker->email,
                'password' => Hash::make($faker->randomNumber(9, false)),
            ]);

            $userData = UserData::create([
                'user_id' => $user->id
            ]);

            $personal_data = PersonalData::create([
                'user_data_id' => $userData->id,
                'birth_place' => $faker->city,
                'birth_date' => $faker->date,
                'religion' => $faker->word,
                'gender' => $faker->randomElement(['male', 'female']),
                'is_married' => $faker->boolean,
                'child_count' => $faker->numberBetween(0, 5),
                'mbti' => $faker->randomElement(['ISTJ', 'ESTP', 'INFP', 'ENFJ']),
                'parent_phone_number' => $faker->phoneNumber,
                'emergency_phone_number' => $faker->phoneNumber,
            ]);

            $home_data = HomeData::create([
                'user_data_id' => $userData->id,
                'address' => $faker->address,
                'home_tel' => $faker->phoneNumber,
                'postal_code' => $faker->postcode,
            ]);

            $diploma = json_encode([
                'field_of_study' => $faker->word,
                'orientation' => $faker->word,
                'start' => $faker->date,
                'end' => $faker->date,
                'total_average' => $faker->numberBetween(10, 20),
                'university' => $faker->word,
                'city_of_education' => $faker->city,
            ]);
            $education_data = EducationData::create([
                'user_data_id' => $userData->id,
                'diploma' => $diploma
            ]);

            $course_data = CourseData::create([
                'user_data_id' => $userData->id,
                'title' => $faker->word,
                'start_date' => $faker->date,
                'course_length' => $faker->numberBetween(1, 12),
                'academy_name' => $faker->word,
                'description' => $faker->sentence,
                'evidence' => $faker->numberBetween(0, 1),
            ]);

            $app_experience_data = AppExperienceData::create([
                'user_data_id' => $userData->id,
                'app_name' => $faker->word,
                'history' => $faker->numberBetween(100000000, 999999999),
                'proficiency' => 'medium',
                'project' => $faker->numberBetween(0, 1),
                'consideration' => $faker->sentence,
            ]);

            $military_service_data = MilitaryServiceData::create([
                'user_data_id' => $userData->id,
                'service_status' => 'educational',
                'service_address' => null,
            ]);

            $foreign_languages_data = ForeignLanguagesData::create([
                'user_data_id' => $userData->id,
                'languages_name' => 'english',
                'read' => 'advanced',
                'write' => 'advanced',
                'conversation' => 'advanced',
                'comprehension' => 'advanced',
                'description' => 'gsafsdfasfsa',
            ]);

            $representative_data = RepresentativeData::create([
                'user_data_id' => $userData->id,
                'name' => 'cum qui neque',
                'acquaintance_duration' => 12,
                'relation' => 'asdadsasdasdas',
                'info' => 'asdasdasdasd',
                'introduction_method' => 'makeen_site',
            ]);

            $userData->update([
                'personal_data_id' => $personal_data->id,
                'home_data_id' => $home_data->id,
                'education_data_id' => $education_data->id,
                'military_service_data_id' => $military_service_data->id,
                'foreign_languages_data_id' => $foreign_languages_data->id,
                'representative_data_id' => $representative_data->id,
            ]);

            $user->load(['userData', 'userData.homeData', 'userData.personalData']);

            $this->command->info("User $user->id seeded.");
        }
    }
}

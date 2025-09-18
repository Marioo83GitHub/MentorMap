<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property int $mentor_id
 * @property int $student_id
 * @property string $scheduled_at
 * @property string $status
 * @property int $duration
 * @property int $mentor_present
 * @property int $student_present
 * @property string|null $notes
 * @property int $mentorship_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Mentor $mentor
 * @property-read \App\Models\Mentorship $mentorship
 * @property-read \App\Models\Student $student
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereMentorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereMentorPresent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereMentorshipId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereScheduledAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereStudentPresent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereUpdatedAt($value)
 */
	class Appointment extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $mentor_id
 * @property int $student_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Mentor $mentor
 * @property-read \App\Models\Student $student
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Conversation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Conversation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Conversation query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Conversation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Conversation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Conversation whereMentorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Conversation whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Conversation whereUpdatedAt($value)
 */
	class Conversation extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Department> $departments
 * @property-read int|null $departments_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereUpdatedAt($value)
 */
	class Country extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property int $country_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Country $country
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Department whereUpdatedAt($value)
 */
	class Department extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Subject> $subjects
 * @property-read int|null $subjects_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Discipline newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Discipline newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Discipline query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Discipline whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Discipline whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Discipline whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Discipline whereUpdatedAt($value)
 */
	class Discipline extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $front_id_card_path
 * @property string $back_id_card_path
 * @property string $person_photo_path
 * @property string $submit_date
 * @property string|null $reject_reasons
 * @property int $verified
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IdentityVerification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IdentityVerification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IdentityVerification query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IdentityVerification whereBackIdCardPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IdentityVerification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IdentityVerification whereFrontIdCardPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IdentityVerification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IdentityVerification wherePersonPhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IdentityVerification whereRejectReasons($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IdentityVerification whereSubmitDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IdentityVerification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IdentityVerification whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IdentityVerification whereVerified($value)
 */
	class IdentityVerification extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $about_me
 * @property string $average_rating
 * @property int $hours_taught
 * @property int $finalized_sessions
 * @property string $latitude_aprox
 * @property string $longitude_aprox
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Subject> $subjects
 * @property-read int|null $subjects_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Topic> $topics
 * @property-read int|null $topics_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mentor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mentor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mentor query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mentor whereAboutMe($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mentor whereAverageRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mentor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mentor whereFinalizedSessions($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mentor whereHoursTaught($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mentor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mentor whereLatitudeAprox($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mentor whereLongitudeAprox($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mentor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mentor whereUserId($value)
 */
	class Mentor extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $subject_id
 * @property int $mentor_id
 * @property string $price_per_hour
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Mentor> $mentors
 * @property-read int|null $mentors_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Subject> $subjects
 * @property-read int|null $subjects_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MentorSubject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MentorSubject newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MentorSubject query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MentorSubject whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MentorSubject whereMentorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MentorSubject wherePricePerHour($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MentorSubject whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MentorSubject whereUpdatedAt($value)
 */
	class MentorSubject extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property int $mentor_id
 * @property int $student_id
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Mentor $mentor
 * @property-read \App\Models\Student $student
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mentorship newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mentorship newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mentorship query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mentorship whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mentorship whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mentorship whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mentorship whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mentorship whereMentorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mentorship whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mentorship whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Mentorship whereUpdatedAt($value)
 */
	class Mentorship extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $conversation_id
 * @property int $sender_id
 * @property string $content
 * @property string|null $read_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Conversation $conversation
 * @property-read \App\Models\User $sender
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Message newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Message query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Message whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Message whereConversationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Message whereReadAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Message whereSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Message whereUpdatedAt($value)
 */
	class Message extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $rating
 * @property string|null $comment
 * @property int $mentorship_id
 * @property int $student_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Mentorship $mentorship
 * @property-read \App\Models\Student $student
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review whereMentorshipId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review whereUpdatedAt($value)
 */
	class Review extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereUserId($value)
 */
	class Student extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property int $discipline_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Mentor> $mentors
 * @property-read int|null $mentors_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Topic> $topics
 * @property-read int|null $topics_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subject newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subject query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subject whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subject whereDisciplineId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subject whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subject whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subject whereUpdatedAt($value)
 */
	class Subject extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $topic
 * @property int $mentor_id
 * @property int $subject_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Mentor $mentor
 * @property-read \App\Models\Subject $subject
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Topic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Topic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Topic query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Topic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Topic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Topic whereMentorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Topic whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Topic whereTopic($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Topic whereUpdatedAt($value)
 */
	class Topic extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $type
 * @property string $amount
 * @property int|null $wallet_id
 * @property string|null $admin_notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Wallet|null $wallet
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereAdminNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaction whereWalletId($value)
 */
	class Transaction extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $name
 * @property string|null $surname
 * @property string|null $id_number
 * @property string|null $phone
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $birth_date
 * @property string|null $sex
 * @property string|null $profile_picture_path
 * @property string $account_status
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $department_id
 * @property-read \App\Models\Department|null $department
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\IdentityVerification> $identityVerification
 * @property-read int|null $identity_verification_count
 * @property-read \App\Models\Mentor|null $mentor
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \App\Models\Student|null $student
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAccountStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereIdNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereProfilePicturePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutRole($roles, $guard = null)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $available_balance
 * @property string $held_balance
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereAvailableBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereHeldBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wallet whereUserId($value)
 */
	class Wallet extends \Eloquent {}
}


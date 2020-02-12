<?php

namespace App\Policies;

use App\Questionnaire;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionnairePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any questionnaires.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the questionnaire.
     *
     * @param  \App\User  $user
     * @param  \App\Questionnaire  $questionnaire
     * @return mixed
     */
    public function view(User $user, Questionnaire $questionnaire)
    {
        //
    }

    /**
     * Determine whether the user can create questionnaires.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the questionnaire.
     *
     * @param  \App\User  $user
     * @param  \App\Questionnaire  $questionnaire
     * @return mixed
     */
    public function update(User $user, Questionnaire $questionnaire)
    {
        return $user->id == $questionnaire->user_id;
    }

    /**
     * Determine whether the user can delete the questionnaire.
     *
     * @param  \App\User  $user
     * @param  \App\Questionnaire  $questionnaire
     * @return mixed
     */
    public function delete(User $user, Questionnaire $questionnaire)
    {
        //
    }

    /**
     * Determine whether the user can restore the questionnaire.
     *
     * @param  \App\User  $user
     * @param  \App\Questionnaire  $questionnaire
     * @return mixed
     */
    public function restore(User $user, Questionnaire $questionnaire)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the questionnaire.
     *
     * @param  \App\User  $user
     * @param  \App\Questionnaire  $questionnaire
     * @return mixed
     */
    public function forceDelete(User $user, Questionnaire $questionnaire)
    {
        //
    }
}

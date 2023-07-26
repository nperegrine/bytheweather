<?php

namespace App\Enums;

abstract class ErrorMessages extends StdEnum
{
    const LOW_BALANCE = 'The coins of the company account is low i.e. it does not have enough coins to complete the action.';

    const CANDIDATE_NOT_CONTACTED = 'The candidate has not been contacted. You must contact a candidate before you can hire them.';

    const CANDIDATE_HIRED = 'The candidate has already been hired.';

    const EMAIL_NOT_SENT = 'Something went wrong and the email could not be sent.';
}

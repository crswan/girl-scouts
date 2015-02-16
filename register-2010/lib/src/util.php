<?php 
function PDC_RegistrationDeadlinePassed()
{
global $PDC_Today, $PDC_RegistrationStartDate, $PDC_RegistrationDeadline;
if ( $PDC_Today > $PDC_RegistrationDeadline  || (isset ($_REQUEST["debugLateFee"] ) && $_REQUEST["debugLateFee"]== TRUE ) )
	return TRUE;
else return FALSE;

}

// In 2011 we're not allowing aides to register after the deadline, but next year we may want to re-enable them.
// The check is done in several places, so rather than having date validation all over the place, isolate it 
// here so we can turn this check on and off more easily.

// Note that the the site talks about aide registrations as being date-related, 
// so if they're are disallowed for other reasons, the site will still need some HTML updates.
function PDC_AcceptingAideRegistrations()
{
	if ( PDC_RegistrationDeadlinePassed() )
	{
		PDC_EchoDebug("in PDC_RegistrationDeadlinePassed, it's passed!");
		return FALSE;
	}
	else 
	{
		PDC_EchoDebug("in PDC_RegistrationDeadlinePassed, you're in time!");
			return TRUE;
	}
}

function PDC_EchoDebug($str)
{
	if (isset($_REQUEST['debug']) && $_REQUEST['debug'] )
		echo "<br /><b>DEBUG:</b> " . $str;
}

?>


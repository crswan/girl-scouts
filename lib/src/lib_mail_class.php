d<?php

/**
 * Mail class
 *
 * This class handles email routing & delivery
 *
 * @version     $Revision: #1 $
 *
 * based in part on http://search.cpan.org/doc/JENDA/Mail-Sender-0.7.10/Sender.pm
 *
 */
class Mail
{
    /**
     * Subject attribute
     */
    var $mSubject = NULL;

    /**
     * Subject accessor
     */
    function Subject( $var = NULL )
    {
        if ( isset( $var ) )
        {
            $this->mSubject = $var;
        }
        return $this->mSubject;
    }

    /**
     * Body attribute
     */
    var $mBody = NULL;

    /**
     * Body accessor
     */
    function Body( $var = NULL )
    {
        if ( isset( $var ) )
        {
            $this->mBody = $var;
        }
        return $this->mBody;
    }

    /**
     * Multipart attribute
     */
    var $mMultipart = NULL;

    /**
     * Multipart accessor
     */
    function Multipart( $var = NULL )
    {
        if ( isset( $var ) )
        {
            $this->mMultipart = $var;
        }
        return $this->mMultipart;
    }


    /**
     * The name of the sender.
     */
    var $mFromName = 'Socia Website';

    /**
     * mFromName accessor
     */
    function FromName( $var = NULL )
    {
        if ( isset( $var ) )
        {
            $this->mFromName = $var;
        }
        return $this->mFromName;
    }

    /**
     * The email of the sender.
     */
    var $mFromEmail = 'sylke@sociateam.com';

    /**
     * mFromEmail accessor
     */
    function FromEmail( $var = NULL )
    {
        if ( isset( $var ) )
        {
            $this->mFromEmail = $var;
        }
        return $this->mFromEmail;
    }

    /**
     * The name of the recipient.
     */
    var $mTo = 'Socia Administrator';

    /**
     * mto accessor
     */
    function ToName( $var = NULL )
    {
        if ( isset( $var ) )
        {
            $this->mTo = $var;
        }
        return $this->mTo;
    }

    /**
     * The email of the recipient.
     */
    var $mToEmail = 'sylke@sociateam.com, hanzel@gmail.com';
//    var $mToEmail = 'hanzel@gmail.com';

    /**
     * mToEmail accessor
     */
    function ToEmail( $var = NULL )
    {
        if ( isset( $var ) )
        {
            $this->mToEmail = $var;
        }
        return $this->mToEmail;
    }


    /**
     * This function sends email
     *
     * @return  int      error code
     */
    function SendMail()
    {
        $headers  = 'From: ' . $this->FromName( ) . '<' . $this->FromEmail( ) . ">\n"
                  .  'X-Sender: <' . $this->FromEmail( ) . ">\n"
                  .  "X-Mailer: PHP\n"
                  .  "X-Priority: 3\n"
                  .  "Return-Path: <" . $this->FromEmail( ) . ">\n";

        if ( !empty( $email_hash['cc'] ) )
        {
            $headers .= 'cc: ' . $email_hash['cc_email'] . "\n";
        }

        if ( !empty( $email_hash['bcc'] ) )
        {
            $headers .= 'bcc: ' . $email_hash['bcc_email'] . "\n";
        }

        // ::TODO:: capture return value of mail() and handle failure
        $email_status = mail( $this->ToEmail(), $this->Subject(), wordwrap($this->Body() ), $headers );

        return $email_status;
    }

}
?>
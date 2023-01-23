<?php 

class Invoice
{  
    public function process(
        string $creditCardNumber, 
        string $expireDate, 
        string $cvv, 
        int $amount)
    {
        //if we face an error while payment process
        throw new RuntimeException('something went wrong');
        
    }

}
#$invoice = new Invoice();
#$invoice->process('6362141084012377', '12/01', '234', 1300);

#------------------------------------------------------------------------------------
#     if we run above code we can see parameters which we passed to process method
#------------------------------------------------------------------------------------
// PHP Fatal error:  Uncaught RuntimeException: something went wrong in /.../php82_sandbox/Hide_sensitive_info_from_backtraces_Sensitive_Parameters.php:8
// Stack trace:
// #0 /Applications/MAMP/htdocs/php-oop-sandbox/php82_sandbox/Hide_sensitive_info_from_backtraces_Sensitive_Parameters.php(14): 
// Invoice->process('636214108401237...', '12/01', '234', 1300)
// #1 {main}
//   thrown in /.../php82_sandbox/Hide_sensitive_info_from_backtraces_Sensitive_Parameters.php on line 8


class SensitiveInvoice
{  
    public function process(
        #[SensitiveParameter] string $creditCardNumber, 
        #[SensitiveParameter] string $expireDate, 
        #[SensitiveParameter] string $cvv, 
        int $amount)
    {
        //if we face an error while payment process
        throw new RuntimeException('something went wrong');
        
    }

}
$SensitiveInvoice = new SensitiveInvoice();
$SensitiveInvoice->process('6362141084012377', '12/01', '234', 1300);
#--------------------------------------------------------------------------------------------------------------
#     with using #[SensitiveParameter] before value definition on method we can hide the values in backtrace
#--------------------------------------------------------------------------------------------------------------

// Fatal error: Uncaught RuntimeException: something went wrong in /.../php82_sandbox/Hide_sensitive_info_from_backtraces_Sensitive_Parameters.php:32
// Stack trace:
// #0 /.../php82_sandbox/Hide_sensitive_info_from_backtraces_Sensitive_Parameters.php(38): 
//Invoice2->process(Object(SensitiveParameterValue), Object(SensitiveParameterValue), Object(SensitiveParameterValue), 1300)

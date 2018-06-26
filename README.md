# Learnyst-PHP
Composer Package for Learnyst API

# Usage

```require_once $_SERVER['DOCUMENT_ROOT'].'/private/vendor/autoload.php';```

```use Donnie\Learnyst\Learnyst;```

```
// inject authorised token and domain name here
$LMS = new Learnyst(config('learnyst.auth'), config('learnyst.domain'));
$LMS->name = $Human->name;
$LMS->email = $Human->email;
$LMS->password = $Human->password;
$LMS->mobile = $Human->phone;
$LMS->courseID = $Course->lmsId;

$Add = $LMS->addStudent();
$Enrol = $LMS->enrolStudent();

if (isset($Add->redirection_url)) {
// on adding you may receive redirection url
  $Out['sso'] = $Add->redirection_url;
} else {
// if not you may try logging in with password
  $Login = $LMS->loginStudent();
  $Out['sso'] = @$Login->redirection_url;
}

```

If you still do not receive any redirection URL you may want to just forward them to the login page.

Feel free to fork or make this better


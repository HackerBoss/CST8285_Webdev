<script type="text/javascript" src="includes/jFormer/JFormerUtility.js"></script>
<script type="text/javascript" src="includes/jFormer/JFormer.js"></script>
<script type="text/javascript" src="includes/jFormer/JFormComponent.js"></script>
<script type="text/javascript" src="includes/jFormer/JFormComponentAddress.js"></script>
<script type="text/javascript" src="includes/jFormer/JFormComponentCreditCard.js"></script>
<script type="text/javascript" src="includes/jFormer/JFormComponentDate.js"></script>
<script type="text/javascript" src="includes/jFormer/JFormComponentDropDown.js"></script>
<script type="text/javascript" src="includes/jFormer/JFormComponentFile.js"></script>
<script type="text/javascript" src="includes/jFormer/JFormComponentHidden.js"></script>
<script type="text/javascript" src="includes/jFormer/JFormComponentLikert.js"></script>
<script type="text/javascript" src="includes/jFormer/JFormComponentLikertStatement.js"></script>
<script type="text/javascript" src="includes/jFormer/JFormComponentMultipleChoice.js"></script>
<script type="text/javascript" src="includes/jFormer/JFormComponentName.js"></script>
<script type="text/javascript" src="includes/jFormer/JFormComponentSingleLineText.js"></script>
<script type="text/javascript" src="includes/jFormer/JFormComponentTextArea.js"></script>
<script type="text/javascript" src="includes/jFormer/JFormPage.js"></script>
<script type="text/javascript" src="includes/jFormer/JFormSection.js"></script>
<script type="text/javascript" src="includes/jFormer/JFormerDatePicker.js"></script>
<script type="text/javascript" src="includes/jFormer/JFormerMask.js"></script>
<script type="text/javascript" src="includes/jFormer/JFormerScroller.js"></script>
<script type="text/javascript" src="includes/jFormer/JFormerTip.js"></script>

   <div id="testing">

   <?php 
   require_once("includes/jFormer/jFormer.php");

   // Create the form
if(file_exists('../php/JFormer.php')) {
    require_once('../php/JFormer.php');
}
else if(file_exists('../../php/JFormer.php')) {
    require_once('../../php/JFormer.php');
}

// Create the form
$loginForm = new JFormer('loginForm', array(
    'title' => '<h1>Login</h1>',
    'submitButtonText' => 'Login',
    'requiredText' => ' (required)'
));

// Add components to the section
$loginForm->addJFormComponentArray(array(
    new JFormComponentSingleLineText('username', 'Username:', array(
        'validationOptions' => array('required', 'username'),
        'tip' => '<p>The <a href="/">demo</a> login is <b>admin</b>.</p>',
        'persistentTip' => true
    )),
    new JFormComponentSingleLineText('password', 'Password:', array(
        'type' => 'password',
        'validationOptions' => array('required', 'password'),
        'tip' => '<p>Password is 12345</p>',
    )),
    new JFormComponentMultipleChoice('rememberMe', '',
        array(
            array('label' => 'Remember me'),
        ),
        array(
            'tip' => '<p>If a cookie is set you can have this checked by default.</p>',
        )
    ),
));

// Set the function for a successful form submission
function onSubmit($formValues) {
    // Server side checks go here
    if($formValues->username == 'admin' && $formValues->password == '12345') {
        // If they want to be remembered
        if(!empty($formValues->rememberMe)) {
            // Let them know they successfully logged in
            $response = array('successPageHtml' => '
                <h2>Login Successful</h2>
                <p>We will keep you logged in on this computer.</p>
            ');
            // Alternatively, you could also do a redirect
            //return array('redirect' => 'http://www.jformer.com');
        }
        // If they do not want to be remembered
        else {
            $response = array('successPageHtml' => '
                <h2>Login Successful</h2>
                <p>We will not keep you logged in on this computer.</p>
            ');
        }
    }
    // If login fails, give a failure notice
    else {
        $response = array(
            'failureNoticeHtml' => 'Invalid username or password.',
            'failureJs' => "$('#password').val('').focus();",  // You can pass a JavaScript callback to run if it fails
        );
    }

    return $response;
}

// Process any request to the form
$loginForm->processRequest();
?>

</div>

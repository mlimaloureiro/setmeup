<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Set Me Up</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="css/preview.css" rel="stylesheet" />
    <link href="css/setmeup.css" rel="stylesheet" />
    <script src="js/libs/modernizr.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
</head>
<body class="eternity-form">
    <nav class="main-nav">
        <ul>
            <li><a href="#demo0" class="active" data-title="Intro" data-panel="first"></a></li>
            <li><a href="#demo1" data-title="Check" data-panel="second"></a></li>
            <li><a href="#demo2" data-title="Registration Form" data-panel="third"></a></li>
            <li><a href="#demo3" data-title="Process" data-panel="fourth"></a></li>
            <!--<li><a href="#demo6" data-title="Forgot Password Form Dark" data-panel="sixth"></a></li>-->
        </ul>
    </nav>

    <section class="colorBg form-seprator i1" id="demo0" data-panel="first">

        <i class="icon-thumbs-up" data-animation="bounceInUp"></i>
        <h1 data-animation="bounceInUp" data-animation-delay=".2s">SetMeUp</h1>
        <br />
        <hgroup>
            <h2 data-animation="fadeInUp" data-animation-delay=".3s">Write once.</h3>
            <h2 data-animation="fadeInUp" data-animation-delay=".4s">Apply everywhere.</h3>
        </hgroup>

    </section>
   
    <section class="colorBg1 colorBg" id="demo1" data-panel="second">

        <div class="container">

            <div class="login-form-section">
                <div class="login-content " data-animation="bounceIn">
                    <form>
                        <div class="section-title">
                            <h3>Start by choosing your username, we'll check the availability for you.</h3>
                        </div>

                        <div class="textbox-wrap">
                            <div class="input-group">
                                <span class="input-group-addon "><i class="icon-user icon-color"></i></span>
                                <input type="text" required="required" id="username_input" class="form-control" placeholder="Type your awesome username here" />
                            </div>
                        </div>

                        <div class="results-availability">


                            <!-- jeesus, need to change this on js -->
                            <div class="twitter-checking" style="display:none;">
                                <div class="textbox-wrap" style='border-left:5px solid #eae560; background-color:#f9f7d1; color:#f6ae38;'>
                                    <img style="width:24px" src="img/icons/twitter.png" /> checking ... <img src="img/icons/ajax-loader.gif" style="width:24px">
                                </div>
                            </div>

                            <div class="twitter-positive" style="display:none;">
                                <div class="textbox-wrap" style='border-left:5px solid #2ecc71; background-color:#dcffeb;color:#2ecc71;'>
                                    <img style="width:24px" src="img/icons/twitter.png" /> is available
                                </div>
                            </div>

                            <div class="twitter-negative" style="display:none;">
                                <div class="textbox-wrap" style='border-left:5px solid #be1c1c; background-color:#f2bcbc;color:#be1c1c;'>
                                    <img style="width:24px" src="img/icons/twitter.png" /> is not available
                                </div>
                            </div>

                            <div class="facebook-checking" style="display:none;">
                                <div class="textbox-wrap" style='border-left:5px solid #eae560; background-color:#f9f7d1;color:#f6ae38;'>
                                    <img style="width:24px" src="img/icons/facebook.png" /> checking ... <img src="img/icons/ajax-loader.gif" style="width:24px">
                                </div>
                            </div>

                            <div class="facebook-positive" style="display:none;">
                                <div class="textbox-wrap" style='border-left:5px solid #2ecc71; background-color:#dcffeb;color:#2ecc71;'>
                                    <img style="width:24px" src="img/icons/facebook.png" /> is available
                                </div>
                            </div>

                            <div class="facebook-negative" style="display:none;">
                                <div class="textbox-wrap" style='border-left:5px solid #be1c1c; background-color:#f2bcbc;color:#be1c1c;'>
                                    <img style="width:24px" src="img/icons/facebook.png" /> is not available
                                </div>
                            </div>

                            <!--
                            <div class="linkedin-checking" style="display:none;">
                                <div class="textbox-wrap" style='border-left:5px solid #eae560; background-color:#f9f7d1;color:#f6ae38;'>
                                    <img style="width:24px" src="img/icons/linkedin.png" /> checking ... <img src="img/icons/ajax-loader.gif" style="width:24px">
                                </div>
                            </div>

                            <div class="linkedin-positive" style="display:none;">
                                <div class="textbox-wrap" style='border-left:5px solid #2ecc71; background-color:#dcffeb;color:#2ecc71;'>
                                    <img style="width:24px" src="img/icons/linkedin.png" /> is available
                                </div>
                            </div>

                            <div class="linkedin-negative" style="display:none;">
                                <div class="textbox-wrap" style='border-left:5px solid #be1c1c; background-color:#f2bcbc;color:#be1c1c;'>
                                    <img style="width:24px" src="img/icons/linkedin.png" /> is not available
                                </div>
                            </div>
                            -->
                        </div>
                        
                        <div class="login-form-action clearfix">
                            <a href="#demo2" style="margin-left:5px;" class="btn btn-success pull-right green-btn">Continue &nbsp; <i class="icon-chevron-right"></i></a>

                            <button type="submit" id="submit_check_availability" class="btn btn-success pull-right blue-btn">Check &nbsp; </button>

                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="colorBg2 colorBg" id="demo2" data-panel="third">
        <div class=" container">
            <br />
            <br />
            <!-- #region Registration Form -->
            <div class="registration-form-section">
                <form>
                    <div class="section-title reg-header " data-animation="fadeInDown">
                        <h3>Set your basic info </h3>

                    </div>
                    <div class="clearfix">
                        <div class="col-sm-6 registration-left-section  " data-animation="fadeInUp">
                            <div class="reg-content">
                                <div class="textbox-wrap">
                                    <div class="input-group">
                                        <span class="input-group-addon "><i class="icon-user icon-color"></i></span>
                                        <input name="first_name" id="firstname_input" type="text" class="form-control " placeholder="First name" required="required" />
                                    </div>
                                </div>
                                <div class="textbox-wrap">
                                    <div class="input-group">
                                        <span class="input-group-addon "><i class="icon-user icon-color"></i></span>
                                        <input name="last_name" id="lastname_input" type="text" class="form-control " placeholder="LastName" required="required" />
                                    </div>
                                </div>
                                <div class="textbox-wrap">
                                    <div class="input-group">
                                        <span class="input-group-addon "><i class="icon-envelope icon-color"></i></span>
                                        <input name="email" type="email" id="email_input" class="form-control " placeholder="Email" required="required" />
                                    </div>
                                </div>

                                <div class="textbox-wrap">
                                    <div class="input-group">
                                        <span class="input-group-addon "><i class="icon-envelope icon-color"></i></span>
                                        <input name="email-confirmation" id="emailconfirmation_input" type="email" class="form-control " placeholder="Email confirmation" required="required" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 registration-right-section " data-animation="fadeInUp">
                            <div class="reg-content">
                                <div class="textbox-wrap">

                                    <select class="span1" id="birthday_day_input" name="birthday-day">
                                        <option value="0" selected>Day</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">5</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                    </select>

                                    <select class="span1" id="birthday_month_input" name="birthday-month">
                                        <option value="0" selected>Month</option>
                                        <option value="1">Jan</option>
                                        <option value="2">Fev</option>
                                        <option value="3">Mar</option>
                                        <option value="4">Apr</option>
                                        <option value="5">May</option>
                                        <option value="6">Jun</option>
                                        <option value="7">Jul</option>
                                        <option value="8">Ago</option>
                                        <option value="9">Set</option>
                                        <option value="10">Oct</option>
                                        <option value="11">Nov</option>
                                        <option value="12">Dec</option>
                                    </select>

                                    <select name="birthday_year" id="birthday_year_input" class="span1">

                                        <option value="0" selected="1">Year</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option></select>
                                </div>

                                <div class="textbox-wrap">
                                    <div class="input-group">
                                        <span class="input-group-addon "><i class="icon-key icon-color"></i></span>
                                        <input name="password" id="password_input" type="password" class="form-control " placeholder="Password" required="required" />
                                    </div>
                                </div>

                                <div class="textbox-wrap">
                                    <select class="span1" id="sex_input">
                                        <option value="0" selected>Sex</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>

                                <div class="textbox-wrap">
                                    <input type="file">
                                </div>
                                
                                <div class="textbox-wrap" style="margin-bottom:-12px;">
                                    <input type="file">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="registration-form-action clearfix " data-animation="fadeInUp" data-animation-delay=".15s">
                        <a id="submitForm" href="#demo3" class="btn btn-success pull-left blue-btn ">
                            &nbsp; &nbsp;Submit <i class="icon-chevron-right"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="colorBg3 colorBg" id="demo3" data-panel="fourth">
        <div class=" container">
            <br />
            <br />
            <br />

            <div class="forgot-password-section" data-animation="bounceInLeft">
                <div class="section-title">
                    <h3>Setting you up! This may take a while...</h3>
                </div>

                <div class="results-automation">

                <!-- jeesus, need to change this on js -->
                <div class="twitter-checking1" style="display:none;">
                    <div class="textbox-wrap" style='border-left:5px solid #eae560; background-color:#f9f7d1; color:#f6ae38;'>
                        <img style="width:24px" src="img/icons/twitter.png" /> automating ... <img src="img/icons/ajax-loader.gif" style="width:24px">
                    </div>
                </div>

                <div class="twitter-positive1" style="display:none;">
                    <div class="textbox-wrap" style='border-left:5px solid #2ecc71; background-color:#dcffeb;color:#2ecc71;'>
                        <img style="width:24px" src="img/icons/twitter.png" /> Success !
                    </div>
                </div>

                <div class="twitter-negative1" style="display:none;">
                    <div class="textbox-wrap" style='border-left:5px solid #be1c1c; background-color:#f2bcbc;color:#be1c1c;'>
                        <img style="width:24px" src="img/icons/twitter.png" /> Chuck Norris f*cked this up :(
                    </div>
                </div>

                <div class="facebook-checking1" style="display:none;">
                    <div class="textbox-wrap" style='border-left:5px solid #eae560; background-color:#f9f7d1;color:#f6ae38;'>
                        <img style="width:24px" src="img/icons/facebook.png" /> automating ... <img src="img/icons/ajax-loader.gif" style="width:24px">
                    </div>
                </div>

                <div class="facebook-positive1" style="display:none;">
                    <div class="textbox-wrap" style='border-left:5px solid #2ecc71; background-color:#dcffeb;color:#2ecc71;'>
                        <img style="width:24px" src="img/icons/facebook.png" /> Success
                    </div>
                </div>

                <div class="facebook-negative1" style="display:none;">
                    <div class="textbox-wrap" style='border-left:5px solid #be1c1c; background-color:#f2bcbc;color:#be1c1c;'>
                        <img style="width:24px" src="img/icons/facebook.png" /> Chuck Norris f*cked this up :(
                    </div>
                </div>

                <!--
                <div class="linkedin-checking" style="display:none;">
                    <div class="textbox-wrap" style='border-left:5px solid #eae560; background-color:#f9f7d1;color:#f6ae38;'>
                        <img style="width:24px" src="img/icons/linkedin.png" /> checking ... <img src="img/icons/ajax-loader.gif" style="width:24px">
                    </div>
                </div>

                <div class="linkedin-positive" style="display:none;">
                    <div class="textbox-wrap" style='border-left:5px solid #2ecc71; background-color:#dcffeb;color:#2ecc71;'>
                        <img style="width:24px" src="img/icons/linkedin.png" /> is available
                    </div>
                </div>

                <div class="linkedin-negative" style="display:none;">
                    <div class="textbox-wrap" style='border-left:5px solid #be1c1c; background-color:#f2bcbc;color:#be1c1c;'>
                        <img style="width:24px" src="img/icons/linkedin.png" /> is not available
                    </div>
                </div>
                -->
            </div>


            </div>

        </div>
    </section>
    
   
    <section class="colorBg form-seprator nf">


    </section>

    <script src="js/libs/jquery-1.9.1.js"></script>
    <script src="js/template/bootstrap.js"></script>
    <script src="js/libs/jquery.icheck.js"></script>
    <script src="js/template/placeholders.min.js"></script>
    <script src="js/template/waypoints.min.js"></script>
    <script src="js/libs/jquery.panelSnap.js"></script>
    <script src="js/app/init.js"></script>
    <script src="js/app/app.js"></script>

</body>
</html>
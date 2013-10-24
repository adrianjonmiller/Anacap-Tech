<?php
/*
Template Name: Order Form Page
*/
?>

<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		
		
		<form name="form1" method="post" id="post-<?php the_ID(); ?>" action="handleorder.php">
<table width="100%"  border="0" cellspacing="1" bgcolor="#CCCCCC" class="orderform">
          <tr>
            <td width="100%" valign="top"><table width="100%" border=0 cellpadding=5 cellspacing=1>
              <tr bgcolor="#EEEEEE">
                <td  class="Header" colspan="2"><?php edit_post_link('Edit', '<p style="float:right;">', '</p>'); ?><h2>Order Form</h2></td>
              </tr>
               <tr bgcolor="#cafe78">
                <td colspan=2 ><?php the_content(); ?></td>
              </tr>
              <tr bgcolor="#EEEEEE">
                <td colspan=2 >&nbsp;&nbsp;&nbsp; <strong>Company Information</strong></td>
              </tr>
              <tr>
                <td width="22%" bgcolor="#FFFFFF" >
                  <div align="right"><font color="#666666">Company name </font><font color="#666666">&nbsp;&nbsp;</font></div></td>
                <td width="78%" valign="middle" bgcolor="#FFFFFF"> <span class="required">*</span>&nbsp;
                    <input name="COMPANY_NAME" type="text" size="40"></td>
              </tr>
              <tr>
                <td bgcolor="#FFFFFF" >
                  <div align="right"><font color="#666666">Contact Name &nbsp;&nbsp;</font></div></td>
                <td valign="middle" bgcolor="#FFFFFF"><span class="required">*</span>&nbsp;
                  <input name="CONTACT_NAME" type="text" size="40"></td>
              </tr>
              <tr>
                <td bgcolor="#FFFFFF" >
                  <div align="right"><font color="#666666">Phone Number&nbsp;&nbsp;</font></div></td>
                <td valign="middle" bgcolor="#FFFFFF"><span class="required">*</span>&nbsp;
                  <input name="PHONE_NUMBER" type="text" size="40"></td>
              </tr>
              <tr>
                <td bgcolor="#FFFFFF" >
                  <div align="right"><font color="#666666">Email address </font><font color="#666666">&nbsp;&nbsp;</font></div></td>
                <td valign="middle" bgcolor="#FFFFFF"><span class="required">*</span>&nbsp;
                  <input name="EMAIL_ADDRESS" type="text" size="40">
                  <span > </span></td>
              </tr>
              <tr bgcolor="#EEEEEE">
                <td colspan=2 >&nbsp;&nbsp;&nbsp; <strong>Shipping
                    Information</strong></td>
              </tr>
				  <tr>
    <td valign="top" bgcolor="#FFFFFF" >
      <div align="right"><font color="#666666"> Address &nbsp;&nbsp;</font></div></td>
    <td valign="middle" bgcolor="#FFFFFF"><span class="required">*</span>&nbsp;
        <textarea name="ADDRESS" cols="40" rows="4"></textarea></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" >
      <div align="right"><font color="#666666">City&nbsp;&nbsp;</font></div></td>
    <td valign="middle" bgcolor="#FFFFFF"><span class="required">*</span>&nbsp;
      <input name="CITY" type="text" size="40">
      <span > </span> </td></tr>
  <tr>
    <td bgcolor="#FFFFFF" >
      <div align="right"><font color="#666666">Region</font><font color="#666666">&nbsp;&nbsp;</font></div></td>
                        <td valign="middle" bgcolor="#FFFFFF"><span class="required">*</span>&nbsp;<span ><font color="#666666">State&nbsp;&nbsp; 
                          <select name="STATE">
                            <OPTION value="AL">AL</OPTION>
                            <OPTION value="AK">AK</OPTION>
                            <OPTION value="AZ">AZ</OPTION>
                            <OPTION value="AR">AR</OPTION>
                            <OPTION value="CA" selected>CA</OPTION>
                            <OPTION value="CO">CO</OPTION>
                            <OPTION value="CT">CT</OPTION>
                            <OPTION value="DE">DE</OPTION>
                            <OPTION value="FL">FL</OPTION>
                            <OPTION value="GA">GA</OPTION>
                            <OPTION value="HI">HI</OPTION>
                            <OPTION value="ID">ID</OPTION>
                            <OPTION value="IL">IL</OPTION>
                            <OPTION value="IN">IN</OPTION>
                            <OPTION value="IA">IA</OPTION>
                            <OPTION value="KS">KS</OPTION>
                            <OPTION value="KY">KY</OPTION>
                            <OPTION value="LA">LA</OPTION>
                            <OPTION value="ME">ME</OPTION>
                            <OPTION value="MD">MD</OPTION>
                            <OPTION value="MA">MA</OPTION>
                            <OPTION value="MI">MI</OPTION>
                            <OPTION value="MN">MN</OPTION>
                            <OPTION value="MS">MS</OPTION>
                            <OPTION value="MO">MO</OPTION>
                            <OPTION value="MT">MT</OPTION>
                            <OPTION value="NE">NE</OPTION>
                            <OPTION value="NV">NV</OPTION>
                            <OPTION value="NH">NH</OPTION>
                            <OPTION value="NJ">NJ</OPTION>
                            <OPTION value="NM">NM</OPTION>
                            <OPTION value="NY">NY</OPTION>
                            <OPTION value="NC">NC</OPTION>
                            <OPTION value="ND">ND</OPTION>
                            <OPTION value="OH">OH</OPTION>
                            <OPTION value="OK">OK</OPTION>
                            <OPTION value="OR">OR</OPTION>
                            <OPTION value="PA">PA</OPTION>
                            <OPTION value="RI">RI</OPTION>
                            <OPTION value="SC">SC</OPTION>
                            <OPTION value="SD">SD</OPTION>
                            <OPTION value="TN">TN</OPTION>
                            <OPTION value="TX">TX</OPTION>
                            <OPTION value="UT">UT</OPTION>
                            <OPTION value="VT">VT</OPTION>
                            <OPTION value="VA">VA</OPTION>
                            <OPTION value="WA">WA</OPTION>
                            <OPTION value="WV">WV</OPTION>
                            <OPTION value="WI">WI</OPTION>
                            <OPTION value="WY">WY</OPTION>
                            <OPTION value="not_in_us">Not in U.S.</OPTION>
                          </select>
                          <span class="required">*</span>                          </font></span>&nbsp;<span ><font color="#666666">Zip</font></span>&nbsp;&nbsp; 
                          <input name="ZIP" type="text" size="10">                          &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<span ><font color="#666666">&nbsp; 
                        </font></span> </td>
  </tr>
	<tr bgcolor="#EEEEEE">
      <td colspan=2 >&nbsp;&nbsp;&nbsp; <strong>Product Information</strong></td>
   </tr>
  <tr>
    <td bgcolor="#FFFFFF" >
      <div align="right"><font color="#666666">Product</font><font color="#666666">&nbsp;&nbsp;</font></div></td>
    <td valign="middle" bgcolor="#FFFFFF"><span class="required">*</span>&nbsp;
      <select name="PRODUCT">
        <option value="No Product Specified!" selected>-- Select a Product --</option>
        <option value="ANASEPT: 4004C    24 count 4 oz.">ANASEPT: 4004C 24 count 4 oz.</option>
        <option value="ANASEPT: 4008C    12 count 8 oz.">ANASEPT: 4008C 12 count 8 oz.</option>
        <option value="ANASEPT: 4008 SC   12 count 8 oz. (Spray)">ANASEPT: 4008 SC 12 count 8 oz. (Spray)</option>
        <option value="ANASEPT 400TC 12 Count 8 oz. (Spray)">ANASEPT 400TC 12 count 8 oz. (Trigger Sprayer)</option>
        <option value="ANASEPT: 4016C    12 Count 16 oz.">ANASEPT: 4016C 12 Count 16 oz.</option>
        <option value="ANASEPT: 4012SC 12 Count 12oz.">ANASEPT: 4012SC 12 Count 12oz. (Trigger Sprayer)</option>
        <option value=" "></option>
        <option value="ANASEPT2: 8008SE  12 count 8oz.">ANASEPT2: 8008SE 12 count 8oz. (Sprayer)</option>
        <option>-</option>
        <option value="ANASEPT GEL: 5003G 12 count 3oz">ANASEPT GEL: 5003G 12 count 3oz</option>
        <option value=" "></option>
        <option value="SANIZONE: 1001A    48 count 1oz. (Spray)">SANIZONE: 1001A 48 count 1oz. (Spray)</option>
        <option value="SANIZONE: 1002A    24 count 2oz. (Spray)">SANIZONE: 1002A 24 count 2oz. (Spray)</option>
        <option value="SANIZONE: 1008A    12 count 8oz. (Spray)">SANIZONE: 1008A 12 count 8oz. (Spray)</option>
        <option value=" "></option>
        <option value="SANIZONE OAD: 1002-OD 24 count 2oz.">SANIZONE OAD: 1002-OD 24 count 2oz. (Dropper Bottle)</option>
        <option value="SANIZONE OAD: 1008-OD 12 count 8oz.">SANIZONE OAD: 1008-OD 12 count 8oz. (Dropper Bottle)</option>
        <option value=" "> </option>
        <option value="MAXGEL 2002H 4 Count 2.4&quot; x 4.8&quot;">MAXGEL 2002H 4count 2.4&quot; x 4.8&quot;</option>
        <option value="MAXGEL 2004H 4 Count 4&quot; x 4&quot;">MAXGEL 2004H 4count 4&quot; x 4&quot;</option>
		<option value=" "> </option>
        <option value="SILVER-SEPT 3015S 12 Count 1.5oz.">SILVER_SEPT 3015S 12count 1.5oz. (Tube)</option>
<!--        <option value="SILVER-SEPT 3003S 12 Count 3 oz.">SILVER_SEPT 3003S 12count 3 oz. (Tube)</option>
-->                          </select>
        <span > </span></td>
  </tr>
	<tr bgcolor="#EEEEEE">
      <td colspan=2 >&nbsp;&nbsp;&nbsp; <strong>Validation Image</strong></td>
   </tr>
  <tr>
  	<td ></td>
    <td >
    <script>
var RecaptchaOptions = {
   theme : 'white'
};
</script>
    <script type="text/javascript"
   src="http://api.recaptcha.net/challenge?k=6LfIlgMAAAAAAEj8az0ql1wl-YPYqHDYxqNiEbBB">
</script>

<noscript>
   <iframe src="http://api.recaptcha.net/noscript?k=6LfIlgMAAAAAAEj8az0ql1wl-YPYqHDYxqNiEbBB
   "
       height="300" width="500" frameborder="0"></iframe><br>
   <textarea name="recaptcha_challenge_field" rows="3" cols="40">
   </textarea>
   <input type="hidden" name="recaptcha_response_field" 
       value="manual_challenge">
</noscript></td></tr>
                <tr>
                  <td align="right" bgcolor="#FFFFFF" class="Copy"><span class="required">*Required</span></td>
				  <td valign="middle" bgcolor="#FFFFFF">
      				<input type="submit" value="submit">
      				<span class="required">*</span></td>
              </tr>
             
            </table>
            
            </table>
            
            <?php endwhile; endif; ?>

<?php get_footer(); ?>






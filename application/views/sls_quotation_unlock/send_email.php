<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Email</title>
    <style>
    /* -------------------------------------
        INLINED WITH htmlemail.io/inline
    ------------------------------------- */
    /* -------------------------------------
        RESPONSIVE AND MOBILE FRIENDLY STYLES
    ------------------------------------- */
    @media only screen and (max-width: 620px) {
      table[class=body] h1 {
        font-size: 28px !important;
        margin-bottom: 10px !important;
      }
      table[class=body] p,
            table[class=body] ul,
            table[class=body] ol,
            table[class=body] td,
            table[class=body] span,
            table[class=body] a {
        font-size: 16px !important;
      }
      table[class=body] .wrapper,
            table[class=body] .article {
        padding: 10px !important;
      }
      table[class=body] .content {
        padding: 0 !important;
      }
      table[class=body] .container {
        padding: 0 !important;
        width: 100% !important;
      }
      table[class=body] .main {
        border-left-width: 0 !important;
        border-radius: 0 !important;
        border-right-width: 0 !important;
      }
      table[class=body] .btn table {
        width: 100% !important;
      }
      table[class=body] .btn a {
        width: 100% !important;
      }
      table[class=body] .img-responsive {
        height: auto !important;
        max-width: 100% !important;
        width: auto !important;
      }
	  



    }

    /* -------------------------------------
        PRESERVE THESE STYLES IN THE HEAD
    ------------------------------------- */
    @media all {
      .ExternalClass {
        width: 100%;
      }
      .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
        line-height: 100%;
      }
      .apple-link a {
        color: inherit !important;
        font-family: inherit !important;
        font-size: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
        text-decoration: none !important;
      }
      #MessageViewBody a {
        color: inherit;
        text-decoration: none;
        font-size: inherit;
        font-family: inherit;
        font-weight: inherit;
        line-height: inherit;
      }
      .btn-primary table td:hover {
        background-color: #34495e !important;
      }
      .btn-primary a:hover {
        background-color: #34495e !important;
        border-color: #34495e !important;
      }
	  
   

}
</style>
  </head>
  <body class="" style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
    <table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;">
      <tr>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
        <td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 780px; padding: 10px; width: 780px;">
          <div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 780px; padding: 10px;">

            <!-- START CENTERED WHITE CONTAINER -->
            <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">This is preheader text. Some clients will show this text as a preview.</span>
            <table class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 15px;">
                  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                    <tr>
                      <td style="font-family: sans-serif; font-size: 13px; vertical-align: top;">
                       
						            <!--
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Klik Link dibawah ini untuk melakukan reset password.</p>
						            -->
                       
                        
                        <table border=0 class="">
                          <tr>
                            <td valign="top">To Branch</td>
                            <td valign="top">:</td>
                            <td valign="top"><?php echo $rs_data[0]["nama_cabang"]; ?></td>
                          </tr>
                          <tr>
                            <td valign="top">Date</td>
                            <td valign="top">:</td>
                            <td valign="top"><?php echo format_date($rs_data[0]["tgl_visit"]); ?></td>
                          </tr>
                          <tr>
                            <td valign="top">Due Date</td>
                            <td valign="top">:</td>
                            <td valign="top"><?php echo format_date($rs_data[0]["due_date"]); ?></td>
                          </tr>
                          <tr>
                            <td valign="top">Report Number</td>
                            <td valign="top">:</td>
                            <td valign="top"><?php echo $rs_data[0]["no_report"]; ?></td>
                          </tr>
                          <tr>
                            <td valign="top">Customer</td>
                            <td valign="top">:</td>
                            <td valign="top"><?php echo $rs_data[0]["nama_customer"]; ?></td>
                          </tr>

                          <tr>
                            <td valign="top">Sales Engineering</td>
                            <td valign="top">:</td>
                            <td valign="top"><?php echo $rs_data[0]["nama_salesman"]; ?></td>
                          </tr>

                          <tr>
                            <td valign="top">Remark</td>
                            <td valign="top">:</td>
                            <td valign="top"><?php echo $rs_data[0]["issue"]; ?></td>
                          </tr>
                          <tr>
                            <td valign="top"></td>
                          
                          </tr>
                        </table>
                        <br/>
                        <?php if($rs_data[0]["is_send_cs"]==1){ ?>
                          <?php if($rs_data[0]["id_cabang"]==1){ ?>
                          <a target="" class="btn btn-xs btn-primary" href="http://119.110.70.141:8080/yph/sls_sales_visit_report_cs/entry/?id=<?php echo $rs_data[0]["id"];?>">View Details For CS DADAP</a>
                          <?php }?>

                          <?php if($rs_data[0]["id_cabang"]!=1){ ?>
                          <a target="" class="btn btn-xs btn-primary" href="http://119.110.70.141:8080/yph/sls_sales_visit_report_cs_brc/entry/?id=<?php echo $rs_data[0]["id"];?>">View Details For CS BRANCH</a>
                          <?php }?>
                        <?php }?>

                        <?php if($rs_data[0]["is_send_inv"]==1){ ?>
                            <a target="" class="btn btn-xs btn-primary" href="http://119.110.70.141:8080/yph/sls_sales_visit_report_inv/entry/?id=<?php echo $rs_data[0]["id"];?>">View Details For INVENTORY</a>
                        <?php }?>

                        <?php if($rs_data[0]["is_send_eng"]==1){ ?>
                            <a target="" class="btn btn-xs btn-primary" href="http://119.110.70.141:8080/yph/sls_sales_visit_report_eng/entry/?id=<?php echo $rs_data[0]["id"];?>">View Details For ENGINEERING</a>
                        <?php }?>

                        <!-- <br/>
                        <a target="" class="btn btn-xs btn-warning" href="http://119.110.70.141:8080/yph/sls_sales_visit_report_inv/entry/?id=<?php echo $rs_data[0]["id"];?>">View Details For INV</a> -->
                        <?php //echo $rs_data[0]["precontent"]; ?>

                        <p>Attachment :<br>
                        <?php 
                        if($rs_data[0]["attachment1"]!="") echo show_file($rs_data[0]["attachment1"]);
                        if($rs_data[0]["attachment2"]!="") echo show_file($rs_data[0]["attachment2"]);
                        if($rs_data[0]["attachment3"]!="") echo show_file($rs_data[0]["attachment3"]);
                        if($rs_data[0]["attachment4"]!="") echo show_file($rs_data[0]["attachment4"]);
                        if($rs_data[0]["attachment5"]!="") echo show_file($rs_data[0]["attachment5"]);
                        // if($rs_data[0]["attachment1"]!="") echo '<img src="' . base_url() . 'upload/' . $rs_data[0]["attachment1"] . '" width="100">';
                        // if($rs_data[0]["attachment2"]!="") echo '<img src="' . base_url() . 'upload/' . $rs_data[0]["attachment2"] . '" width="100">';
                        // if($rs_data[0]["attachment3"]!="") echo '<img src="' . base_url() . 'upload/' . $rs_data[0]["attachment3"] . '" width="100">';
                        // if($rs_data[0]["attachment4"]!="") echo '<img src="' . base_url() . 'upload/' . $rs_data[0]["attachment4"] . '" width="100">';
                        // if($rs_data[0]["attachment5"]!="") echo '<img src="' . base_url() . 'upload/' . $rs_data[0]["attachment5"] . '" width="100">';
                        
                        function show_file($filename){
                          $file_parts = pathinfo($filename);
                          $result = "";

                          switch($file_parts['extension']){
                            case "jpg":
                            case "jpeg":
                            case "png":
                            case "gif":
                            case "bmp":
                            $result = '<img src="' . base_url() . 'upload/' . $filename . '" width="100">';
                            break;
                            default: 
                            $result = '<a href="' . base_url() . 'upload/' . $filename . '" target="_blank">'.$filename.'</a>';								
                            break;
                          }
                          return $result;
                          
                        }
                        
                        ?>
						
					
						
						
					
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>

            <!-- START FOOTER -->
			<!--
			-->
            <div class="footer" style="clear: both; Margin-top: 10px; text-align: center; width: 100%;">
              <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                <tr>
                  <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
                    <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">PT. Yerry Primatama Hosindo - Fluid Power</span>
                    <br><a href="https://yerryprimatama-fluidpower.com" style="text-decoration: underline; color: #999999; font-size: 12px; text-align: center;">https://yerryprimatama-fluidpower.com</a>.
                  </td>
                </tr>
                <tr>
                 
                </tr>
              </table>
            </div>
            <!-- END FOOTER -->

          <!-- END CENTERED WHITE CONTAINER -->
          </div>
        </td>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
      </tr>
    </table>
  </body>
</html>
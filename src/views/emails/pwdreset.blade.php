@extends('cmauth::emails.layout')


@section('contenttop')
	<table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile2" bgcolor="#ffffff"object="drag-module-small" style="background-color: rgb(255, 255, 255);">
		<tr>
			<td width="100%" valign="middle">
			 
				<table width="540" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter2">
					<tr>
						<td valign="middle" width="100%" style="text-align: left; font-family: Helvetica, Arial, sans-serif; font-size: 14px; color: rgb(63, 67, 69); line-height: 24px;">
							<!--[if !mso]><!--><span style="font-family: 'proxima_nova_rgregular', Helvetica; font-weight: normal;"><!--<![endif]-->
							Please click the button below to reset your password.
							<br/> 
							
							This form will expire in {{ Config::get('auth.reminder.expire', 60) }} minutes.
							<!--[if !mso]><!--></span><!--<![endif]-->
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
@stop

@section('contentmid')
	<!----------------- Button Center ---------------   -->
	<table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile2" bgcolor="#ffffff"object="drag-module-small" style="background-color: rgb(255, 255, 255);">
		<tr>
			<td width="100%" valign="middle">
			 
				<table width="540" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter2">
					<tr>
						<td>
							<table border="0" cellpadding="0" cellspacing="0" align="center"> 
								<tr> 
									<td align="center" height="45"bgcolor="#4edeb5" style="border-top-left-radius: 5px; border-top-right-radius: 5px; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px; padding-left: 30px; padding-right: 30px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; color: rgb(255, 255, 255); background-color: rgb(65, 138, 185);">
										<!--[if !mso]><!--><span style="font-family: 'proxima_nova_rgbold', Helvetica; font-weight: normal;"><!--<![endif]-->
											<a href="{{ URL::to('password/reset', array($token)) }}" style="color: rgb(255, 255, 255); font-size: 15px; text-decoration: none; line-height: 34px; width: 100%;">Reset Passsword</a>
										<!--[if !mso]><!--></span><!--<![endif]-->
									</td> 
								</tr> 
							</table> 
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table><!----------------- End Button Center --------------- -->
@stop

@section('contentbottom')

	<table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile2" bgcolor="#ffffff"object="drag-module-small" style="background-color: rgb(255, 255, 255);">
		<tr>
			<td width="100%" valign="middle">
			 
				<table width="540" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter2">
					<tr>
						<td valign="middle" width="100%" style="text-align: left; font-family: Helvetica, Arial, sans-serif; font-size: 14px; color: rgb(63, 67, 69); line-height: 24px;">
							<!--[if !mso]><!--><span style="font-family: 'proxima_nova_rgregular', Helvetica; font-weight: normal;"><!--<![endif]-->	
							If the button is not working, you can also copy the link below and paste it on your browser.
							<br/>
							{{ URL::to('password/reset', array($token)) }}
							<br/><br/>
							<!--[if !mso]><!--></span><!--<![endif]-->
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
@stop
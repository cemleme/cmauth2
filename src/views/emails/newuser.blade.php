@extends('cmauth::emails.layout')


@section('contenttop')

	<table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile2" bgcolor="#ffffff"object="drag-module-small" style="background-color: rgb(255, 255, 255);">
		<tr width="100%">
			<td width="100%" valign="middle">
			 
				<table width="540" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter2">
					<tr width="100%">
						<td valign="middle" width="100%" style="text-align: left; font-family: Helvetica, Arial, sans-serif; font-size: 23px; color: rgb(63, 67, 69); line-height: 30px; font-weight: 100;">
							<!--[if !mso]><!--><span style="font-family: 'proxima_novathin', Helvetica; font-weight: normal;"><!--<![endif]-->Dear {{$name}}, <!--[if !mso]><!--></span><!--<![endif]-->
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	
	<table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile2" bgcolor="#ffffff"object="drag-module-small" style="background-color: rgb(255, 255, 255);">
		<tr width="100%"><td width="100%" valign="middle"><table width="540" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter2"><tr width="100%">
		<td width="100%" height="30"></td></tr></table></td></tr>
	</table>

	<table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile2" bgcolor="#ffffff"object="drag-module-small" style="background-color: rgb(255, 255, 255);">
		<tr width="100%">
			<td width="100%" valign="middle">
			 
				<table width="540" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter2">
					<tr width="100%">
						<td valign="middle" width="100%" style="text-align: left; font-family: Helvetica, Arial, sans-serif; font-size: 14px; color: rgb(63, 67, 69); line-height: 24px;">
							<!--[if !mso]><!--><span style="font-family: 'proxima_nova_rgregular', Helvetica; font-weight: normal;"><!--<![endif]-->
							You are registered to {{ Config::get('app.title') }}.
							<br/> 
							Your access information is as follows:
							<br/><br/>
							<b>Username:</b> {{$email}}
							<br/>
							<b>Temporary Password:</b> {{$password}}
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
		<tr width="100%">
			<td width="100%" valign="middle">
			 
				<table width="540" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter2">
					<tr width="100%">
						<td>
							<table border="0" cellpadding="0" cellspacing="0" align="center"> 
								<tr width="100%"> 
									<td align="center" height="45"bgcolor="#4edeb5" style="border-top-left-radius: 5px; border-top-right-radius: 5px; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px; padding-left: 30px; padding-right: 30px; font-weight: bold; font-family: Helvetica, Arial, sans-serif; color: rgb(255, 255, 255); background-color: rgb(65, 138, 185);">
										<!--[if !mso]><!--><span style="font-family: 'proxima_nova_rgbold', Helvetica; font-weight: normal;"><!--<![endif]-->
											<a href="{{ url('/') }}" style="color: rgb(255, 255, 255); font-size: 15px; text-decoration: none; line-height: 34px; width: 100%;">{{ Config::get('app.title') }}</a>
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
		<tr width="100%">
			<td width="100%" valign="middle">
			 
				<table width="540" border="0" cellpadding="0" cellspacing="0" align="center" style="text-align: center; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="fullCenter2">
					<tr width="100%">
						<td valign="middle" width="100%" style="text-align: left; font-family: Helvetica, Arial, sans-serif; font-size: 14px; color: rgb(63, 67, 69); line-height: 24px;">
							<!--[if !mso]><!--><span style="font-family: 'proxima_nova_rgregular', Helvetica; font-weight: normal;"><!--<![endif]-->	
							You can enter the system by clicking the button above or from {{ url('/') }}
							<br/><br/>
							Please change your password and do not share it with anyone.
							<br/><br/>
							<!--[if !mso]><!--></span><!--<![endif]-->
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
@stop
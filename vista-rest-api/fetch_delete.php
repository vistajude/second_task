<?php

//fetch.php

//$api_url = "http://localhost/tutorial/rest-api-crud-using-php/api/test_api.php?action=fetch_all";
//http://localhost/rest-api-crud-using-php/api/test_api.php

$api_url = "http://localhost/vista-rest-api/api/test_api.php?action=fetch_all";


$client = curl_init($api_url);

curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($client);

$result = json_decode($response);

$output = '';

if(count($result) > 0)
{
	foreach($result as $row)
	{
		$output .= '
		<tr>
			<td>'.$row->first_name.'</td>
			<td>'.$row->last_name.'</td>
			
			<td><button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row->id.'" style="width:100%">Delete</button></td>
		</tr>
		';
	}
}
else
{
	$output .= '
	<tr>
		<td colspan="4" align="center">Please insert a data. Click Add button</td>
	</tr>
	';
}

echo $output;

?>
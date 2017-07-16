<p style="text-align: center;"></p>
<p style="text-align: center;"><style>
table, th, td {<br />    border: 1px solid black;<br />    border-collapse: collapse;<br />}<br /></style></p>
<p style="text-align: center;"></p>
<h1 style="text-align: center;">قائمه بجميع المتدربات المشتركات في معهد البصائر</h1>
<h2 style="text-align: center;">للبحث عن متدربه الرجاء ذكر السجل المدني او رقم الجوال</h2>
<form action="" method="post"><input name="search" type="text" placeholder="السجل المدني او رقم الجوال" />
<button name="submit" type="submit">بحث</button></form>
<h4 style="text-align: center;">نتائج البحث</h4>
<table style="width: 100%;">
<tbody>
<tr>
<th>الرقم</th>
<th>اسم المتدربه</th>
<th>السجل المدني</th>
<th>الجنسيه</th>
<th>رقم الجوال</th>
<th>الدورات المشاركه</th>
<th>تحديث السجل المدني</th>
<th>تحديث الجوال</th>
</tr>
<?
if ( isset( $_POST['submit'] ) )
{
global $wpdb;
$trainee_search_ID = $_POST['search'];
$results = $wpdb->get_results("SELECT * FROM trainee WHERE trainee_ID = '$trainee_search_ID' OR phone = '$trainee_search_ID' OR trainee_ID_S =  '$trainee_search_ID' ",ARRAY_A) or die(' لم يتم العثور على متدربه بهذا السجل المدني او رقم الجوال، الرجاء اعاده المحاوله مجدداً بالرجوع الى الخلف');
for ($i=0; $i<count($results); $i++) 
{
echo"<tr>";
echo"<td>";
echo $i+1;
echo"<td>";
echo $results[$i]['trainee_name'];
echo"</td>";
echo"<td>";
echo $results[$i]['trainee_ID_S'];
$T_ID=$results[$i]['trainee_ID_S'];
echo"</td>";
echo"<td>";
echo $results[$i]['nationality'];
echo"</td>";
echo"<td>";
echo $results[$i]['phone'];
echo"</td>";
echo"<td>";
echo $results[$i]['attending_courses'];
echo"</td>";
echo"<td>";
echo"<form action='' method='post'>";
echo"<input  name='new_ID' type='text' value=''/>";
echo"<input type='hidden' name='Id' value='$T_ID'/>";
echo"<button name='edit_ID' type='submit'>";
echo"تحديث";
echo"</button>";
echo"</form>";
echo"</td>";
echo"<td>";
echo"<form action='' method='post'>";
echo"<input  name='Phone' type='text' value=''/>";
echo"<input type='hidden' name='Id' value='$T_ID'/>";
echo"<button name='edit' type='submit'>";
echo"تحديث";
echo"</button>";
echo"</form>";
echo"</td>";
echo"</tr>";
}
}

if ( isset( $_POST['edit_ID'] ) )
{
global $wpdb;
$New_ID= $_POST['new_ID'];
$t_ID= $_POST['Id'];
$wpdb->query("UPDATE  trainee SET trainee_ID_S= '$New_ID' WHERE trainee_ID= '$t_ID' ") or die ( "لقد تم التعديل على السجل المدني سابقاً");
 echo "تم تحديث السجل المدني بنجاح.";
}

if ( isset( $_POST['edit'] ) )
{
global $wpdb;
$PHONE_T= $_POST['Phone'];
$t_ID= $_POST['Id'];
$wpdb->query("UPDATE  trainee SET phone= '$PHONE_T' WHERE trainee_ID_S= '$t_ID' ");
 echo "تم تحديث الجوال بنجاح.";
}
?>
</tbody>
</table>
<h2 style="text-align: center;">قائمه المتدربات</h2>

<table style="width: 100%;">
<tbody>
<tr>
<th style="text-align: center;">الرقم</th>
<th style="text-align: center;">اسم المتدربه</th>
<th style="text-align: center;">السجل المدني</th>
<th style="text-align: center;">الجنسيه</th>
<th style="text-align: center;">رقم الجوال</th>
<th style="text-align: center;">الدورات المشاركه</th>
</tr>
<?php
global $wpdb;

$results = $wpdb->get_results("SELECT * FROM trainee ORDER BY trainee_name ASC",ARRAY_A);
for ($i=0; $i<count($results); $i++) 
{
echo"<tr>";
echo"<td>";
echo $i+1;
echo"</td>";
echo"<td>";
echo $results[$i]['trainee_name'];
echo"</td>";
echo"<td>";
echo $results[$i]['trainee_ID_S'];
echo"</td>";
echo"<td>";
echo $results[$i]['nationality'];
echo"</td>";
echo"<td>";
echo $results[$i]['phone'];
echo"</td>";
echo"<td>";
echo $results[$i]['attending_courses'];
echo"</td>";
echo"</tr>";

}
?>
</tbody>
</table>

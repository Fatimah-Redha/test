<p style="text-align: center;"></p>
<p style="text-align: center;"><style>
table, th, td {<br />    border: 1px solid black;<br />    border-collapse: collapse;<br />}<br /></style></p>
<p style="text-align: center;"></p>
<h1 style="text-align: center;">كشف سجل الرغبات</h1>
<h2 style="text-align: center;">  الرجاء اختيار اسم الدوره المعتمده ليتم عرض سجل الرغبات فيها</h2>
<dive style="text-align: center;">
<form action="" method="post">
اسم الدوره المعتمده
<?
global $wpdb;
$results = $wpdb->get_results("SELECT approved_ID,course_name FROM courses ORDER BY course_name ASC",ARRAY_A);
echo "<select  name='Approved_ID'  value=''></option>"; 

foreach (($results) as $row)
{
echo "<option value=$row[approved_ID]->$row[course_name]</option>"; 
}
 echo "</select>";
?>
<button name="submit" type="submit">اختيار</button></form>
</dive>
<h4 style="text-align: center;">جميع المعلومات المتعلقه بالدوره</h4>

<table style="width: 100%;">
<tbody>
<tr>
<th>اسم الدوره</th>
<th>مدتها بالأيام </th>
<th>عدد الساعات</th>
<th>رقم الاعتماد</th>
</tr>
<?
if ( isset( $_POST['submit'] ) )
{
global $wpdb;
$course_ID_name = $_POST['Approved_ID'];
$results = $wpdb->get_results("SELECT * FROM courses  WHERE approved_ID = '$course_ID_name' ",ARRAY_A);
for ($i=0; $i<count($results); $i++) 
{
echo"<tr>";
echo"<td>";
echo $results[$i]['course_name'];
echo"</td>";
echo"<td>";
echo $results[$i]['days'];
echo"</td>";
echo"<td>";
echo $results[$i]['hours'];
echo"</td>";
echo"<td>";
echo $results[$i]['approved_ID'];
echo"</td>";
echo"</tr>";
}
}
?>
</tbody>
</table>
<h4 style="text-align: center;"> قائمه بأسماء المتدربات الراغبات التسجيل في هذه الدوره مرتبه بالتاريخ الأحدث</h4>

<table style="width: 100%;">
<tbody>
<tr>
<th>الرقم</th>
<th>اسم المتدربه</th>
<th>رقم الجوال</th>
<th>تاريخ تسجيل الرغبه</th>
</tr>
<?
if ( isset( $_POST['submit'] ) )
{
global $wpdb;
$course_ID_name = $_POST['Approved_ID'];

$results = $wpdb->get_results("SELECT  desires.approved_ID,desires.trainee_name,desires.phone,desires.desires_Date,courses.approved_ID, courses.course_name FROM courses INNER JOIN desires ON courses.approved_ID = desires.approved_ID WHERE desires.approved_ID = '$course_ID_name' ORDER BY desires.desires_Date DESC LIMIT 40",ARRAY_A);

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
echo $results[$i]['phone'];
echo"</td>";
echo"<td>";
echo $results[$i]['desires_Date'];
echo"</td>";
echo"</tr>";
}
}
?>
</tbody>
</table>

<style>
table, th, td {<br />    border: 1px solid black;<br />    border-collapse: collapse;<br />}<br /></style>
<h1>الدورات التدريبيه التي يقدمها معهد البصائر و بشهادات معتمده من المؤسسه العامه للدريب التقني و المهني</h1>
<table style="width: 100%;">
<tbody>
<tr>
<th>الرقم</th>
<th>اسم الدوره</th>
<th>مدتها بالأيام </th>
<th>عدد الساعات</th>
<th>رقم الاعتماد</th>
</tr>
<?php
global $wpdb;
$results = $wpdb->get_results("SELECT * FROM courses ORDER BY course_name ASC",ARRAY_A);
for ($i=0; $i<count($results); $i++) 
{
echo"<tr>";
echo"<td>";
echo $i+1;
echo"</td>";
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
?>
</tbody>
</table>
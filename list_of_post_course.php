<style>
table, th, td {<br />    border: 1px solid black;<br />    border-collapse: collapse;<br />}<br /></style>
<h1>الدورات التدريبيه المقامه في معهد البصائر</h1>
<table style="width: 100%;">
<tbody>
<tr>
<th>الرقم</th>
<th>اسم الدوره المقامه</th>
<th>اسم الدوره الرئيسي </th>
<th>اسم المدربه</th>
<th>تاريخ اقامه الدوره</th>
<th>الفئه العمريه</th>
<th>رسوم الدوره</th>
</tr>
<?
global $wpdb;
$results = $wpdb->get_results("SELECT posting_course.approved_ID, posting_course.posting_course_name, posting_course.date, posting_course.ages,posting_course.trainers_ID , posting_course.price, posting_course.course_ID,courses.course_name, trainers.trainers_name FROM courses INNER JOIN posting_course ON courses.approved_ID = posting_course.approved_ID INNER JOIN trainers ON posting_course.trainers_ID = trainers.trainers_ID ORDER BY posting_course_name ASC",ARRAY_A);
for ($i=0; $i<count($results); $i++) {
echo"<tr>";
echo"<td>";
echo $i+1;
echo"</td>";
echo"<td>";
echo $results[$i]['course_ID'];
echo"</td>";
echo"<td>";
echo $results[$i]['posting_course_name'];
echo"</td>";
echo"<td>";
echo $results[$i]['course_name'];
echo"</td>";
echo"<td>";
echo $results[$i]['trainers_name'];
echo"</td>";
echo"<td>";
echo $results[$i]['date'];
echo"</td>";
echo"<td>";
echo $results[$i]['ages'];
echo"</td>";
echo"<td>";
echo $results[$i]['price'];
echo"</td>";
echo"</tr>";
}
?>
</tbody>
</table>
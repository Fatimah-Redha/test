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
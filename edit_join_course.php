<p style="text-align: center;"><style>
table, th, td {<br />    border: 1px solid black;<br />    border-collapse: collapse;<br />}<br /></style></p>

<h1 style="text-align: center;">انسحاب متدربه من دوره</h1>
<h2 style="text-align: center;">الرجاء اختيار المتدربه ليتم عرض جميع بيانات الدورات المسجله</h2>
<dive style="text-align: center;">
<form action="" method="post">اسم المتدربه
[xyz-ips snippet="displaytrainee"]
<button name="submit" type="submit">اختيار</button></form>
</dive>
<h4 style="text-align: center;">جميع المعلومات المتعلقه بالمتدربه</h4>

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
[xyz-ips snippet="searchoftrainee"]
</tbody>
</table>

<table style="width: 100%;">
<tbody>
<tr>
<th>الرقم</th>
<th>اسم الدوره</th>
<th>تاريخ اقامه الدوره</th>
<th>المدفوع</th>
<th>الباقي</th>
<th>رقم السند الاول</th>
<th>رقم السند الثاني</th>
</tr>
<?
if ( isset( $_POST['submit'] ) )
{
global $wpdb;
$trainee_ID = $_POST['search'];
$results = $wpdb->get_results("SELECT  join_course.course_ID,join_course.trainee_ID,join_course.paid,join_course.rest, join_course.bill,join_course.bill_2,posting_course.course_ID,posting_course.posting_course_name,posting_course.date FROM posting_course INNER JOIN join_course ON posting_course.course_ID= join_course.course_ID WHERE join_course.trainee_ID = '$trainee_ID' ORDER BY posting_course.posting_course_name ASC",ARRAY_A);

for ($i=0; $i<count($results); $i++) 
{
echo"<tr>";
echo"<td>";
echo $i+1;
echo"</td>";
echo"<td>";
echo $results[$i]['posting_course_name'];
echo"</td>";
echo"<td>";
echo $results[$i]['date'];
echo"</td>";
echo"<td>";
echo $results[$i]['paid'];
echo"</td>";
echo"<td>";
echo $results[$i]['rest'];
echo"</td>";
echo"<td>";
echo $results[$i]['bill'];
echo"</td>";
echo"<td>";
echo $results[$i]['bill_2'];
echo"</td>";
echo"</tr>";

}
}
?>
</tbody>
</table>
<h2 style="text-align: center;">لللإنسحاب من دوره معينه الرجاء ذكر رقم السند</h2>
<form action="" method="post">اسم الدوره
<div style='border: 1px solid red;'>
(الرجاء كتابه علامه - قبل كتابه اسم الدور ليتم مسح الدوره من خانه الدورات المشاركه)
</div>
<input name="C_name" type="text" value="" />
رقم السند
<input name="Bill_ID" type="text" value="" />
<input name="test" type="hidden" value="1" />
<button name="delete" type="submit">انسحاب</button>
</form>
<?
if ( isset( $_POST['delete'] ) )
{
global $wpdb;
$bill_ID = $_POST['Bill_ID'];
$Test= $_POST['test'];
$c_name= $_POST['C_name'];
if ($bill_ID == "") 
				{
					$errormessage = $errormessage . "رقم السند مطلوب <br />";
                                          
				}
			else if ($c_name== "") 
				{
					$errormessage = $errormessage . "اسم الدوره مطلوبه <br />";
                                        
				}
if ($errormessage != "") 
			{
				echo "<div style='border: 2px solid red;'><h1>خطأ</h1>" . $errormessage . "</div><br />";
			}
		else
			{

$wpdb->query("DELETE FROM join_course WHERE bill = $bill_ID OR bill_2 = $bill_ID ");
if ($Test == 1)
{
$wpdb->query("UPDATE  trainee SET attending_courses = REPLACE(attending_courses, '$c_name', '')");
echo "<div style=  'border: 1px solid black;'><h1>تم الانسحاب من الدوره بنجاح</h1>"  . "</div><br />";
}
}

}
?>
<h2 style="text-align: center;">لإضافه سند ثاني الرجاء ذكر رقم السند الأول</h2>
<form action="" method="post">رقم السند الأول
<input name="Bill_ID" type="text" value="" />
رقم السند الثاني
<div style='border: 1px solid red;'>
(في حاله تواجد اكثر من سند الرجاء ذكر آخر رقم سند)
</div>
<input name="Bill_ID_2" type="text" value="" />
<button name="edit1" type="submit">اضافه</button>
</form>
<?
if ( isset( $_POST['edit1'] ) )
{
global $wpdb;
$Bill_ID_1= $_POST['Bill_ID'];
$Bill_ID_2= $_POST['Bill_ID_2'];
$wpdb->query("UPDATE  join_course SET bill_2= '$Bill_ID_2' WHERE bill= '$Bill_ID_1' ") or die (" لم يتم ايجاد سند بهذا الرقم المذكور");
 echo "تم اضافه رقم السند الثاني بنجاح";
}
?>
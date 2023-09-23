<script type="text/javascript">
    function Sum_number()
    {
        // ประกาศตัวแปร
		//num1 = Format(Text1, "#,###,###,###.00") 
        var num1 = document.getElementById('num1').value;
        var num2 = document.getElementById('num2').value;
        //ประกาศหากกรณีuserยังไม่คีย์ให้ค่าในกล่องเป็น 0 เพื่อป้องกันปัญหา NaN
        if (num1 == ""  ) { num1=0; }
        if (num2 == ""  ) { num2=0; }
        // ส่วนประมวลผล
        var sum = parseInt(num1) - parseInt(num2);
        document.getElementById('sum').value = sum;
    }
</script>

<script language="JavaScript">
			function chkNum(ele)
			{
				var num = parseFloat(ele.value);
				ele.value = num.toFixed(2);
			}
		</script>


<form action="" name="frm">
<table>
<tr id="b">
    <td  id="linbtn" colspan="3" align="right">รวมยอดรายการ PO ที่ออกไปแล้ว</td>
    <td  id="linbtn" align="right"><? echo number_format($total, 2); ?></td>
  </tr>
  <tr id="b">
    <td colspan="3" align="right">PR คงเหลือ</td>
    <td align="right" id="linbtnd"><input type="text" name="num1" id="num1" style="width:100px;" value="<? echo$remain; ?>" readonly> <br>
    </td>
  </tr>
  <tr>
    <td colspan="3" align="right">&nbsp;</td>
    <td align="right" id="linbtnd4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="right"><span style="padding-left:10px">ขอเบิก PO งวดนี้</span></td>
    <td align="right" id="linbtnd3"><input type="text" name="num2" id="num2" style="width:100px;" onKeyUp="Sum_number();" OnChange="JavaScript:chkNum(this)"></td>
  </tr>
  <tr>
    <td colspan="3" align="right">PR คงเหลือหลังเปิด PO งวดนี้</td>
    <td align="right" id="linbtnd2"><input type="text" name="sum" id="sum" style="width:100px;" onKeyUp="JavaScript:chkNum(this)"></td>
  </tr>
</table>

</form>

      <table id="example1" class="table table-bordered table-striped datatable">
        <thead>
        <tr>
         <th>User</th>
          <th>Booking Id</th>
          <th>Ticket No</th>
          <th> Amount</th>

        </tr>
        </thead>
        <tbody>

               <?php foreach($list as $value){
                ?>
                <tr>

                     <td><?php echo  $value->name;?></td>
                    <td><?php echo $value->booking_id;?></td>
                    <td><?php echo $value->seat_no;?></td>
                    <td><?php echo  $value->amount;?>   </td>
                </tr>
         <?php } ?>
         <tr>
        
           <td colspan="4" align="right">Grand Total : <?php echo $currency->currrency_symbol;?><?php echo $lists->total;?></td>

         </tr>
        </tbody>
        <tfoot>
        <tr>
          <th>User</th>
          <th>Booking Id</th>
          <th>Ticket No</th>
          <th>Total Amount</th>

       
        </tr>
        </tfoot>
      </table>
  









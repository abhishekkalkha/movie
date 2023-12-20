
      <table id="example1" class="table table-bordered table-striped datatable">
        <thead>
        <tr>
         <th>User</th>
          <th>Booking Id</th>
          <th>Ticket No</th>
          <th>Amount</th>

        </tr>
        </thead>
        <tbody>
                <tr>

                     <td><?php echo  $list->name;?></td>
                    <td><?php echo $list->booking_id;?></td>
                    <td><?php echo $list->seat_no;?></td>
                    <td><?php echo  $list->amount;?>   </td>
                </tr>
         
        </tbody>
        <tfoot>
        <tr>
          <th>User</th>
          <th>Booking Id</th>
          <th>Ticket No</th>
          <th>Amount</th>

       
        </tr>
        </tfoot>
      </table>
   








<?php //echo form_open(base_url().'shop/remove'.$rowid); ?>

<table class="tablewhole" cellpadding="6" cellspacing="1" border="2">

<tr class="tableheader">
  <th>Quantity ordered</th>
  <th>Product</th>
  <th>Price</th>
  <th>Sub-Total</th>
  <th>Action</th>
</tr>


<?php $i = 1; ?>

<?php foreach ($this->cart->contents() as $items): 
   
?>

	<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

	<tr class="tablebody">
	  <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
	  <td>
		<?php echo $items['name']; ?>

			<!-- <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

				<p>
					<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

						<strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

					<?php endforeach; ?>
				</p>

			<?php endif; ?> -->

	  </td>
	  
	  <td>Kshs <?php echo $this->cart->format_number($items['price']); ?></td>
	  <td>Kshs <?php echo $this->cart->format_number($items['subtotal']); ?></td>
	  <td class="remove"><a href="<?php echo base_url().'shop/remove/'.$items['rowid'] ?>">Remove</a></td>
	  	
	</tr>

<?php $i++; 


?>

<?php endforeach; ?>

<tr class="tablefooter">
  <!-- <td colspan="2"> </td> -->
  <td ><strong>Grand Total</strong></td>
  <td >Kshs <?php echo $this->cart->format_number($this->cart->total()); ?></td>
</tr>

</table>

<p class="cartbutton"><a href="<?php echo base_url(). 'shop/update/'.$items['rowid']?>"><button class="btn btn-success">Update Cart</button></a></p>

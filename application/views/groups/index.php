<div class="row">

    <div class="col-md-12">

	    <ol class="breadcrumb">
		  <li><a href="/">Онлайн навчання ДПЗС</a></li>		  
		  <li class="active">Перелік груп</li>
		</ol> 

		<h1><a title="Додати нову групу" href="/groups/create" class="btn btn-success pull-right btn-xs"><span class="glyphicon-plus"></span> Додати групу</a> Перелік груп</h1>
		<hr/>
		
		<table class="table table-striped table-bordered table-hover" border="0">
            <tr>
            	<th>#</th>
                <th class="col-md-12">Номер групи</th>    
                <th></th>            
            </tr>
			<?php
			foreach($groups as $group)
			{				
			?>
			<tr>
				<td><?php echo $group->id; ?></td>
				<td><a href="/groups/view/<?php echo $group->id; ?>"><?php echo $group->num; ?></a></td>	
				<td>
					<button data-toggle="tooltip" title="Видалити" onclick="destroy('/groups/delete/<?php echo $group->id; ?>/<?php echo $group->num; ?>', 'groups')" class="btn btn-link btn-xs"><span class="glyphicon glyphicon-remove"></span></button>					
				</td>						
			</tr>
			<?php	
			}
			?>
		</table>

		<?=$this->pagination->create_links();?>
	</div>
</div>
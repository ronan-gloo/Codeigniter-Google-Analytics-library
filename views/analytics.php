<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<style type="text/css">
			html, body {
			font-family: Arial, "sans-serif";
			color: #555;
			}
			a {
			 	text-decoration: none;
				padding: 4px 7px;
			}
			table {
				width: 100%;
				border: 1px solid #E1E1E1;
			}
			table, tr, td {
				border-spacing: 0;
				border: none;
				font-size: 12px;
			}
			thead, a {
				background: #5c7fa2;
				color: white;
			}
			th {
				padding: 10px;
				font-size: 14px;
				text-align: left;
				border-left: 1px solid silver;
			
			}
			tbody td {
				background-color: #f8f8f8;
				padding: 5px 10px;
				border-bottom: 1px solid #f1f1f1;
			
			}
			tfoot tr{
				height: 30px;
			}
		</style>
	</head>
	<body>

<!-- tableau pour les villes -->		
		<?php if(isset($cities) && is_array($cities)): ?>
			<h4>
				Visites par ville du <?=$cities['summary']->startDate?>
				au <?=$cities['summary']->endDate?>
			</h4>
		    <table>

		    	<thead>
		    		<tr>
		    			<th>Villes (<?=$cities['summary']->totalResults?>)</th>
		    			<th>Visites (<?=$cities['summary']->metrics->visits?>)</th>
		    			<th>Pages vues (<?=$cities['summary']->metrics->pageviews?>)</th>
		    		</tr>
		    	</thead>
		    	
		    	<tbody>
		    	<?php foreach ($cities as $key => $city): if ($key != 'summary'):?>
		    		<tr>
		    			<td><?=$key?></td>
		    			<td><?=$city->visits?></td>
		    			<td><?=$city->pageviews?></td>
		    		</tr>
		    	<?php endif; endforeach ?>
		    	</tbody>
		    		
		    	<?php if (isset($pagination)): ?>
		    	    <tfoot>
		    	    	<tr>
		    	    		<td colspan="3"><?=$pagination?></td>
		    	    	</tr>
		    	    </tfoot>
		    	<?php endif?>
		    
		    </table>
		<?php endif ?>
		
<!-- tableau pour les site référents -->
		<?php if(isset($referrers) && is_array($referrers)): ?>
			<h4>
		    		Sites référents du <?=$referrers['summary']->startDate?>
		    		au <?=$referrers['summary']->endDate?>
			</h4>
		    <table>

		    	<thead>
		    		<tr>
		    			<th>Sites référents (<?=$referrers['summary']->totalResults?>)</th>
		    			<th>Visites (<?=$referrers['summary']->metrics->visits?>)</th>
		    			<th>Pages vues (<?=$referrers['summary']->metrics->pageviews?>)</th>
		    		</tr>
		    	</thead>
		    	
		    	<tbody>
		    	<?php foreach ($referrers as $key => $ref): if ($key != 'summary'):?>
		    		<tr>
		    			<td><?=$key?></td>
		    			<td><?=$ref->visits?></td>
		    			<td><?=$ref->pageviews?></td>
		    		</tr>
		    	<?php endif; endforeach ?>
		    	</tbody>
		    
		    </table>
		<?php endif ?>
		
<!-- Listes pour les comptes -->
		<?php if(isset($accounts)): ?>
		<ol>
			<?php foreach ($accounts as $name => $value):?>
				<?php if ($name == 'segments'):?>
					<li><h4><?=$name?></h4>
						<ul>
							<?php foreach ($value as $segid => $segname):?>
								<li><?=$segid?> : <?=$segname?></li>
							<? endforeach?>
						</ul>
					</li>

				<?php else: ?>
					<li><h4><?=anchor('analytics/accounts'.'/'.$value->profileId, $name)?></h4>
						<ul>
							<li>titre: <?=$value->title?></li>
							<li>ID table: <?=$value->tableId?></li>
							<li>ID du compte: <?=$value->accountId?></li>
							<li> Nome du compte: <?=$value->accountName?></li>
							<li>ID de profil: <?=$value->profileId?></li>
							<li>Tracker: <?=$value->webPropertyId?></li>
						</ul>
					</li>
				<?php endif ?>
			<?php endforeach ?>
		</ol>
		<?php endif ?>

	</body>
</html>
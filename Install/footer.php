		</div>
		<p>
			<div class="panel panel-info">
				<div class="panel-body">
					<center><a href="https://github.com/Caranille/Caranille">RPG made with Caranille</a><br/>
					<?php
						$timeEnd = microtime(true);
						$time = $timeEnd - $timeStart;
						$pageLoadTime = number_format($time, 3);
						echo "Execution time: {$pageLoadTime} seconds</center>";
					?>
				</div>
			</div>
		</p>
		</div>
		<script src="<?= $_SESSION['Link_Root'].'/Design/js/jquery.js' ?>"></script>
		<script src="<?= $_SESSION['Link_Root'].'/Design/js/bootstrap.min.js' ?>"></script>
    </body>
</html>
<?php ob_end_flush(); ?>
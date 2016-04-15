<?php
/*
	Copyright GOBOU Y. Yannick
	
*/


if(isset($this->Register->USER) && is_array($this->Register->USER) && isset($this->Register->USER['ACCOUNT_TYPE']) && ($this->Register->USER['ACCOUNT_TYPE'] >= _native::varn('ACCES_RIGHT_SYSTEM_INFO')) ){



	new \GGN\Using('Numeric');


	/*

		Instruction // DEBUT ///////////////////////////////
		
	*/

		$Reg = $this->Register;

			$Reg->SysRsrc();

		$visits = Register::_REQUEST('visits');

		$users = Register::_REQUEST('users');

		$memory = Register::_REQUEST('memory');

		$disk = Register::_REQUEST('disk');
		
		$period = Register::_REQUEST('period', 'h');

		$time = time();

	/*

		Instruction // FIN ///////////////////////////////
		
	*/




	/*

		Performance Global // DEBUT ///////////////////////////////
		
	*/

		$Performer = $this->node('perfomer');

		$Performer->entry = [];

	/*

		Performance Global // FIN ///////////////////////////////
		
	*/





	/*

		Section : Visites // DEBUT ///////////////////////////////
		
	*/

		if(is_string($visits)){

			$nVisits = $this->node('visits');

			$RHBs = RegisterHistories::Base();

			$nVisits->row = isset($RHBs[RegisterHistories::_VISIT_KEY]) ? $RHBs[RegisterHistories::_VISIT_KEY] : 0;

			$nVisits->label = (new \GGN\Numeric\Unit($nVisits->row, 1))->Label;

				$prid = isset($RHBs[RegisterHistories::_VISIT_KEY_PERIOD]) ? $RHBs[RegisterHistories::_VISIT_KEY_PERIOD] : [];

				$dt = date($period, $time);

			$nVisits->period = (isset($prid[$period . ':' . $dt]) ? $prid[$period . ':' . $dt]+1 : 0);

			$nVisits->lperiod = (new \GGN\Numeric\Unit($nVisits->period, 1))->Label;

			array_push($Performer->entry, ($nVisits->period/($nVisits->row==0?1:$nVisits->row)) * 100);

		}

	/*

		Section : Visites // DEBUT ///////////////////////////////
		
	*/




	/*

		Section : Memoires // DEBUT ///////////////////////////////
		
	*/

		if(is_string($memory)){

			$nMemories = $this->node('memories');

			$nMemories->usage = $Reg->SysMemoryUsage;

				$nMemories->lusage = (new \GGN\Numeric\Unit($nMemories->usage))->Label;

			$nMemories->max = $Reg->SysMemoryMax;

				$nMemories->lmax = (new \GGN\Numeric\Unit($nMemories->max))->Label;

			$nMemories->limit = $Reg->SysMemoryLimit;

				$nMemories->llimit = (new \GGN\Numeric\Unit($nMemories->limit))->Label;


			$nMemories->percent = ($nMemories->usage / $nMemories->limit) * 100;

			array_push($Performer->entry, 100 - $nMemories->percent);

		}

	/*

		Section : Memoires // DEBUT ///////////////////////////////
		
	*/




	/*

		Section : Espace Disque // DEBUT ///////////////////////////////
		
	*/

		if(is_string($disk)){

			$nDisk = $this->node('disk');

			$nDisk->free = $Reg->DiskFreeSpace;

			$nDisk->lfree = (new \GGN\Numeric\Unit($nDisk->free))->Label . 'o';

			$nDisk->total = $Reg->DiskSpace;

			$nDisk->ltotal = (new \GGN\Numeric\Unit($nDisk->total))->Label . 'o';

			$nDisk->percent = ($nDisk->free / $nDisk->total) * 100;

			array_push($Performer->entry, $nDisk->percent);

		}

	/*

		Section : Espace Disque // DEBUT ///////////////////////////////
		
	*/



	/*

		Section : Utilisateur // DEBUT ///////////////////////////////
		
	*/

		if(is_string($users)){

			$nUsers = $this->node('user');

			$nUsers->row = 0;

			$uQPeriod = strtotime($period);

			$uQu = "";
			// $uQu = ($uQPeriod<=0) ? "" : "WHERE DATETIME >= " . ($uQPeriod) . " && DATETIME <= " . $time;

			$UQuery = GUSERS::get($uQu);


			if(isset($UQuery->data)){

				foreach ($UQuery->data['VERS'] as $k=>$vers) {

					if($UQuery->data['DATETIME'][$k] >= $uQPeriod && $UQuery->data['DATETIME'][$k] <= $time){

						$nUsers->row++;

					}
					
				}

			}

			// $nUsers->data = $UQuery->data;

			$nUsers->total = isset($UQuery->row) ? $UQuery->row : 0;

			array_push($Performer->entry, ($nUsers->row/$nUsers->total) * 100);

		}

	/*

		Section : Utilisateur // DEBUT ///////////////////////////////
		
	*/









	$this->Response(true);


}
	
else{

	if(is_array($this->Register->USER) && isset($this->Register->USER['ACCOUNT_TYPE']) && ($this->Register->USER['ACCOUNT_TYPE'] < _native::varn('ACCES_RIGHT_SYSTEM_INFO'))){

		$this->Response('right.not.enough');

	}

	else{

		$this->Response('login');

	}

}

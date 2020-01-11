<?php
    require 'models/modelMessage.php';

    function defaultMsg($myId)
    {
    	require 'views/msgView.php';
    }

    function baseMsg($myId, $freindId)
    {
		$res=selectMyFreind($myId, $freindId);
		$resR=selectMyFreind($freindId, $myId);

		if ($res==1 || $resR==1) {
			require 'views/msgView.php';
		}

	}

	function sendMsg($idEnv, $idRec, $contenu)
	{
		if (isset($_POST['msg'])) {
			insertMsg($idEnv, $idRec, $contenu);
			header('location:index.php?action=msg&id_freind='.$idRec);
		}
	}

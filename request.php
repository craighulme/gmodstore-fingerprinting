<?php
if($_POST['extra'] == "key"){
$hooktable = array
  (
 		"AcceptInput",
        "AllowPlayerPickup",
        "CanExitVehicle",
        "CanPlayerSuicide",
        "CanEditVariable",
        "CanPlayerUnfreeze",
        "CheckPassword",
        "CreateEntityRagdoll",
        "DoPlayerDeath",
        "EntityTakeDamage",
        "GetFallDamage",
        "GravGunOnDropped",
        "GravGunOnPickedUp",
        "IsSpawnpointSuitable",
        "NetworkIDValidated",
        "OnDamagedByExplosion",
        "OnLuaError",
        "OnNPCKilled",
        "OnPhysgunFreeze",
        "OnPhysgunReload",
        "OnPlayerChangedTeam",
        "PlayerAuthed",
        "PlayerCanHearPlayersVoice",
        "PlayerCanJoinTeam",
        "PlayerCanPickupWeapon",
        "PlayerCanPickupItem",
        "PlayerCanSeePlayersChat",
        "PlayerDeath",
        "PlayerDeathSound",
        "PlayerDeathThink",
        "PlayerDisconnected",
        "PlayerFrozeObject",
        "PlayerInitialSpawn",
        "PlayerJoinTeam",
        "PlayerLeaveVehicle",
        "PlayerLoadout",
        "PlayerRequestTeam",
        "PlayerSay",
        "PlayerSelectSpawn",
        "PlayerSelectTeamSpawn",
        "PlayerSetHandsModel",
        "PlayerSetModel",
        "PlayerShouldTaunt",
        "PlayerSilentDeath",
        "PlayerSpawn",
        "PlayerSpawnAsSpectator",
        "PlayerSpray",
        "PlayerStartTaunt",
        "PlayerSwitchFlashlight",
        "PlayerUnfrozeObject",
        "PlayerUse",
        "PostPlayerDeath",
        "ScaleNPCDamage",
        "SetupPlayerVisibility",
        "ShowHelp",
        "ShowSpare1",
        "Showspare2"
);
$name = array( "Sync",
        "Chat",
        "Server",
        "Get",
        "Set",
        "DarkRP",
        "Sandbox",
        "Murder",
        "Prophunt",
        "StarwarsRP",
        "Function",
        "Remove",
        "Add",
        "Delete",
        "Player",
        "Admin",
        "Superadmin",
        "Check",
        "Process",
        "Validate",
        "Verify",
        "Entity",
        "Spawn",
        "Hook",
        "Do",
        "Can",
        "Hacky",
        "Fix",
        "Compatible",
        "Test");
$value = array
(
"true",
"false");

$conn = new mysqli("localhost", "user", "pass","db");

$sql = "SELECT hook, name, value FROM fakefunc where userid = ".$_POST['steamid']." and scriptid = ".$_POST['script_id']."";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo 'hook.Add("'.$row["hook"].'","'.$row["name"].'",function(name) return '.$row["value"].' end)';
        die();
    }
} else {
}
$conn->close();



$base = 'hook.Add("';

$hook = $hooktable[array_rand($hooktable)];
$base .= $hook.'","';

$name1 = $name[array_rand($name)];
$name2 = $name[array_rand($name)];
$name3 = $name[array_rand($name)];
$base .= $name1;
$base .= $name2;
$base .= $name3.'",function(name) ';

$value1 = $value[array_rand($value)];
$base .= "return ".$value1." end)";
echo $base;

$totalname = $name1;
$totalname .= $name2;
$totalname .= $name3;

$conn = new mysqli("localhost", "user", "pass","db");

$sql = 'INSERT INTO fakefunc (scriptid, userid, version,hook,name,value) VALUES ('.$_POST['script_id'].','.$_POST['steamid'].',"'.$_POST['version_name'].'","'.$hook.'","'.$totalname.'","'.$value1.'" )';
if ($conn->query($sql) === TRUE) {

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}




?>
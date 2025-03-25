<?php
include("../config.php");
include "../assets/scripts/sessioncheck.php";
$con->query("
CREATE TABLE IF NOT EXISTS groups (
  id INT PRIMARY KEY AUTO_INCREMENT,
  groupName VARCHAR(64) UNIQUE NOT NULL,
  alias VARCHAR(32) DEFAULT '' NOT NULL,
  isDefault BOOLEAN DEFAULT 0 NOT NULL,
  inheritance TEXT NOT NULL,
  permissions TEXT NOT NULL
)");

$con->query("
CREATE TABLE IF NOT EXISTS groups_mw (
  id INT PRIMARY KEY AUTO_INCREMENT,
  groupName VARCHAR(64) UNIQUE NOT NULL,
  isDefault BOOLEAN DEFAULT 0 NOT NULL,
  worldName TEXT NOT NULL,
  permissions TEXT NOT NULL
)");

$con->query("
CREATE TABLE IF NOT EXISTS players (
  id INT PRIMARY KEY AUTO_INCREMENT,
  userName VARCHAR(16) UNIQUE NOT NULL,
  userGroup VARCHAR(32) NOT NULL,
  permissions TEXT NOT NULL
)");

$con->query("
CREATE TABLE IF NOT EXISTS players_mw (
  id INT PRIMARY KEY AUTO_INCREMENT,
  userName VARCHAR(16) UNIQUE NOT NULL,
  worldName TEXT NOT NULL,
  userGroup VARCHAR(32) NOT NULL,
  permissions TEXT NOT NULL
)");

header("Location: ../index.php?db_configured=true");
?>

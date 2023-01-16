{ pkgs }: {
	deps = [
		pkgs.sudo
  pkgs.percona-server
  pkgs.unzip
  pkgs.php74
	];
}
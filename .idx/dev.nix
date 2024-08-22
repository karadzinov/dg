{pkgs}: {
  channel = "stable-23.11";

  packages = [
    pkgs.nodejs_20
    pkgs.php83
    pkgs.php83Packages.composer
    pkgs.php83Extensions.xdebug
    pkgs.nano
  ];

  services.mysql = {
    enable = true;
    package = pkgs.mysql80;
  };


  idx.extensions = [
    "svelte.svelte-vscode"
    "vue.volar"
    "MrChetan.goto-laravel-components"
    "onecentlin.laravel5-snippets"
    "porifa.laraphense"
    "porifa.laravel-intelephense"
    "amiralizadeh9480.laravel-extra-intellisense"
    "bmewburn.vscode-intelephense-client"
    "bradlc.vscode-tailwindcss"
    "codingyu.laravel-goto-view"
    "EditorConfig.EditorConfig"
    "felixfbecker.php-debug"
    "heybourn.headwind"
    "MehediDracula.php-namespace-resolver"
    "mikestead.dotenv"
    "mohamedbenhida.laravel-intellisense"
    "MrChetan.laravel"
    "MrChetan.laravel-goto-config"
    "MrChetan.phpstorm-parameter-hints-in-vscode"
    "onecentlin.laravel-blade"
    "shufo.vscode-blade-formatter"
    "stef-k.laravel-goto-controller"
    "wongjn.php-sniffer"
    "xabikos.JavaScriptSnippets"
    "Equinusocio.vsc-material-theme"
    "equinusocio.vsc-material-theme-icons"
    "PKief.material-icon-theme"
    "bierner.color-info"
    "xdebug.php-debug"
  ];
  idx.previews = {
    previews = {
      web = {
        command = [
          "npm"
          "run"
          "dev"
          "--"
          "--port"
          "$PORT"
          "--host"
          "0.0.0.0"
        ];
        manager = "web";
      };
    };
  };
}

<body class="<?= $this->bodyClass ?>" <?= (($this->bodyColor) ? 'style="background-color: ' . $this->bodyColor . ';"' : '') ?>>
    <header class="<?= $this->headerClass ?>" <?= (($this->headerColor) ? 'style="background-color: ' . $this->headerColor . ';"' : '') ?>>

        <a href="<?=home_url();?>" title="Go Home">
            [...]
        </a>

        <?php
        global $headerMenu;
        $headerMenu->printMenu();
        ?>

    </header>
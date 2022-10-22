<h1> :heavy_check_mark: Installation</h1>
<h3>Configuration :gear:</h3>
<p>Create .env file from .env.dist example

<code>cp .env.test .env</code>

<h3>Database :floppy_disk:</h3>
<p>Set your database settings to .env file</p>

<code>DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"</code>

<h3>Install :computer:</h3>
<code>composer install</code>

<h3>Run migration :page_facing_up:</h3>
<code>php bin/console doctrine:migrations:migrate</code>

<h2>	:smiley: All done!</h2>

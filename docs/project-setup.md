After [installing WP Assure](https://wpassure.readthedocs.io/en/latest/install/), you need to setup your project and development workflow.

Spin up your local environment. WP Assure will use your local if run with the  `--local` flag. We highly recommend [WP Local Docker](https://github.com/10up/wp-local-docker).

Decide where you want to initialize WP Assure (create wpassure.json) which must be the root of your version controlled repository. This is usually in `wp-content/`, a theme, or a plugin. `wp-content/` might make most sense if you are developing an entire website. Let's assume we are initializing our WP Assure project in `wp-content/` and have installed WP Assure in the same directory.

Navigate to `wp-content` in the command line. Run the following command:
```
./vendor/bin/wpassure init
```

You will be presented with some command prompts. Choose a project slug and select the defaults for the other options. When the command is finished, there will be a `wpassure.json` file in `wp-content` as well as a `tests` directory and an example test, `tests/ExampleTest.php`.

WP Assure reads `wpassure.json` every time tests are run. The file must contain both `name` and `tests` properties in JSON format. `name` is the name of your test suite, and it must be unique. `snapshot_id` is optional and is explained in [Workflow and Snapshots](https://wpassure.readthedocs.io/en/latest/workflow-snapshots/). `tests` points to your test files. WP Assure tests are written in PHP and PHPUnit based.

*There are a few important rules for wpassure.json:*

* `wpassure.json` and the actual tests __must__ exist within the codebase you are testing.
* `wpassure.json` __must__ be located in the root of your version controlled codebase. Typically this means `wpassure.json` is in the root of a theme, plugin, or `wp-content` directory.

Now let's run our tests to make sure everything works:
```
./vendor/bin/wpassure run --local
```

You should see 

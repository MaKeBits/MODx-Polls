<?php
/**
 * Polls Connector
 *
 * @package polls
 */
require_once dirname(dirname(dirname(dirname(__FILE__)))).'/config.core.php';
require_once MODX_CORE_PATH.'config/'.MODX_CONFIG_KEY.'.inc.php';
require_once MODX_CONNECTORS_PATH.'index.php';

$namespace = $modx->getObject('modNamespace', 'polls');
$corePath = $namespace->get('path');
require_once $corePath.'model/polls/polls.class.php';
$modx->polls = new Polls($modx);
$modx->lexicon->load('polls:default');

/* handle request */
$path = $modx->getOption('processorsPath', $modx->polls->config, $corePath.'processors/');

$modx->request->handleRequest(array(
    'processors_path' => $path,
    'location' => '',
));

?>
<?php
/**
 * Plugin's constants
 *
 * @package a8c_Cron_Control
 */

namespace Automattic\WP\Cron_Control;

/**
 * Adjustable queue size and concurrency limits, to facilitate scaling
 */
$job_queue_size = 10;
if ( defined( 'CRON_CONTROL_JOB_QUEUE_SIZE' ) && is_numeric( \CRON_CONTROL_JOB_QUEUE_SIZE ) ) {
	$job_queue_size = absint( \CRON_CONTROL_JOB_QUEUE_SIZE );
	$job_queue_size = max( 1, min( $job_queue_size, 250 ) );
}
define( __NAMESPACE__ . '\JOB_QUEUE_SIZE', $job_queue_size );
unset( $job_queue_size );

$job_concurrency_limit = 10;
if ( defined( 'CRON_CONTROL_JOB_CONCURRENCY_LIMIT' ) && is_numeric( \CRON_CONTROL_JOB_CONCURRENCY_LIMIT ) ) {
	$job_concurrency_limit = absint( \CRON_CONTROL_JOB_CONCURRENCY_LIMIT );
	$job_concurrency_limit = max( 1, min( $job_concurrency_limit, 250 ) );
}
define( __NAMESPACE__ . '\JOB_CONCURRENCY_LIMIT', $job_concurrency_limit );
unset( $job_concurrency_limit );

/**
 * Job runtime constraints
 */
const JOB_QUEUE_WINDOW_IN_SECONDS = 60;
const JOB_TIMEOUT_IN_MINUTES      = 10;
const JOB_LOCK_EXPIRY_IN_MINUTES  = 30;

/**
 * Locks
 */
const LOCK_DEFAULT_LIMIT              = 10;
const LOCK_DEFAULT_TIMEOUT_IN_MINUTES = 10;

/**
 * Bucket Size/Count
 */
const BUCKET_SIZE_DEFAULT         = \MB_IN_BYTES * 0.95;
const BUCKETS_DEFAULT             = 5;

const BUCKET_SIZE_LIMIT           = ( \MB_IN_BYTES * 5 ) * 0.95;
const BUCKETS_LIMIT               = 50;

/**
 * Limit on size of event cache objects
 */
$bucket_size_limit = BUCKET_SIZE_LIMIT;
if ( defined( 'CRON_CONTROL_CACHE_BUCKET_SIZE_LIMIT' ) && is_numeric( \CRON_CONTROL_CACHE_BUCKET_SIZE_LIMIT ) ) {
	$bucket_size_limit = absint( \CRON_CONTROL_CACHE_BUCKET_SIZE_LIMIT );
}

$bucket_size_default = BUCKET_SIZE_DEFAULT;
if ( defined( 'CRON_CONTROL_CACHE_BUCKET_SIZE' ) && is_numeric( \CRON_CONTROL_CACHE_BUCKET_SIZE ) ) {
	$bucket_size_default = absint( \CRON_CONTROL_CACHE_BUCKET_SIZE );
	$bucket_size_default = max( 256 * \KB_IN_BYTES, min( $bucket_size_default, $bucket_size_limit ) );
}
define( __NAMESPACE__ . '\CACHE_BUCKET_SIZE', $bucket_size_default );
unset( $bucket_size_default );

/**
 * Limit how many buckets can be created, to avoid cache exhaustion
 */
$buckets_limit = BUCKETS_LIMIT;
if ( defined( 'CRON_CONTROL_CACHE_BUCKETS_LIMIT' ) && is_numeric( \CRON_CONTROL_CACHE_BUCKETS_LIMIT ) ) {
	$buckets_limit = absint( \CRON_CONTROL_CACHE_BUCKETS_LIMIT );
}

$buckets_default = BUCKETS_DEFAULT;
if ( defined( 'CRON_CONTROL_MAX_CACHE_BUCKETS' ) && is_numeric( \CRON_CONTROL_MAX_CACHE_BUCKETS ) ) {
	$buckets_default = absint( \CRON_CONTROL_MAX_CACHE_BUCKETS );
	$buckets_default = max( 1, min( $buckets_default, $buckets_limit ) );
}
define( __NAMESPACE__ . '\MAX_CACHE_BUCKETS', $buckets_default );
unset( $buckets_default );

/**
 * Consistent time format across plugin
 *
 * Excludes timestamp as UTC is used throughout
 */
const TIME_FORMAT = 'Y-m-d H:i:s';

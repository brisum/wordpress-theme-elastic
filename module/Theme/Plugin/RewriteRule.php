<?php

namespace Elastic\Theme\Plugin;

class RewriteRule
{
    public function __construct()
    {
        add_filter('rewrite_rules_array', [$this, 'filterRewriteRulesArray']);
    }

    public function filterRewriteRulesArray($rewriteRules)
    {
        $rules = [
            '/^tag/',
            '/^type/',
            '/^author/',
            '/attachment/',
            '/embed/',
            '/feed/',
            '/comment-page/',
            '/trackback/',
            '/^page\//',
        ];
        $patterns = [
            '/monthnum/',
            '/year/',
            '/attachment/',
        ];

        foreach ($rewriteRules as $rewriteRule => $rewritePattern) {
            foreach ($rules as $rule) {
                if (preg_match($rule, $rewriteRule)) {
                    unset($rewriteRules[$rewriteRule]);
                    continue 2;
                }
            }

            foreach ($patterns as $pattern) {
                if (preg_match($pattern, $rewritePattern)) {
                    unset($rewriteRules[$rewriteRule]);
                    continue 2;
                }
            }
        }

        return $rewriteRules;
    }
}
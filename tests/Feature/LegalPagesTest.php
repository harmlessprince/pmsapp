<?php

namespace Tests\Feature;

use Tests\TestCase;

class LegalPagesTest extends TestCase
{
    public function test_privacy_policy_page_can_be_viewed(): void
    {
        $response = $this->get('/privacy-policy');

        $response->assertOk();
        $response->assertSee('Privacy Policy');
        $response->assertSee('Account Deletion');
        $response->assertSee('Terms and Conditions');
    }

    public function test_terms_and_conditions_page_can_be_viewed(): void
    {
        $response = $this->get('/terms-and-conditions');

        $response->assertOk();
        $response->assertSee('Terms and Conditions');
        $response->assertSee('Privacy Policy');
        $response->assertSee('Account Deletion');
    }

    public function test_account_deletion_page_redirects_to_privacy_policy_section(): void
    {
        $response = $this->get('/account-deletion');

        $response->assertRedirect('/privacy-policy#account-deletion');
    }
}

@extends('layouts.public')

@section('title', 'PerfTraka Terms and Conditions')

@section('content')
<section class="bg-[#F9FAFB] px-6 py-24 text-[#1F2937] md:py-28">
    <article class="mx-auto max-w-4xl rounded-[8px] bg-white p-6 shadow-sm md:p-10">
        <header class="border-b border-gray-200 pb-6">
            <p class="text-sm font-semibold uppercase tracking-wide text-[#226F65]">PerfTraka</p>
            <h1 class="mt-2 text-3xl font-bold text-[#111827] md:text-4xl">Terms and Conditions</h1>
            <p class="mt-3 text-sm text-gray-500">Last updated: June 13, 2026</p>
        </header>

        <div class="mt-8 space-y-8 leading-7">
            <section>
                <h2 class="text-xl font-bold text-[#111827]">1. Introduction</h2>
                <p class="mt-3">These Terms and Conditions ("Terms") govern access to and use of PerfTraka's web platform, mobile applications, administrative portals, dashboards, APIs, and related services (collectively, the "Service"). PerfTraka is designed to support workforce management, attendance monitoring, security patrol monitoring, site operations, incident reporting, and operational reporting.</p>
                <p class="mt-3">By creating an account, logging in, accessing the Service, using the mobile application, or authorizing users to use PerfTraka on behalf of an organization, you acknowledge that you have read, understood, and agree to these Terms.</p>
                <p class="mt-3">If your organization has entered into a separate written agreement with PerfTraka, that agreement will control where it conflicts with these Terms.</p>
            </section>

            <section>
                <h2 class="text-xl font-bold text-[#111827]">2. Who These Terms Apply To</h2>
                <p class="mt-3">These Terms apply to organizations that subscribe to or authorize use of PerfTraka, including companies, security agencies, employers, contractors, administrators, supervisors, site inspectors, personnel, and other authorized users.</p>
                <p class="mt-3">If you use PerfTraka on behalf of an organization, you represent that you are authorized to do so. The organization is responsible for its administrators, supervisors, employees, contractors, personnel, and all other users it invites or manages through the Service.</p>
            </section>

            <section>
                <h2 class="text-xl font-bold text-[#111827]">3. Use of the Service</h2>
                <p class="mt-3">PerfTraka may be used only for lawful, authorized business purposes related to workforce management, attendance recording, site verification, security patrol monitoring, incident reporting, operational analytics, and related administration.</p>
                <p class="mt-3">You must not use the Service for unlawful surveillance, harassment, discrimination, unauthorized tracking, employee intimidation, or any purpose that violates employment, privacy, data protection, workplace safety, or other applicable laws.</p>
                <p class="mt-3">Organizations using PerfTraka are responsible for configuring the Service appropriately, assigning correct user roles, ensuring users understand relevant workplace policies, and confirming that their use of attendance, incident, image, and location features is lawful in the jurisdictions where they operate.</p>
            </section>

            <section>
                <h2 class="text-xl font-bold text-[#111827]">4. Accounts and Access Credentials</h2>
                <p class="mt-3">Users must provide accurate account information and keep login credentials, passwords, logout PINs, devices, and access tokens secure. You are responsible for activity that occurs through your account unless caused by PerfTraka's failure to meet its security obligations.</p>
                <p class="mt-3">You must notify your organization administrator or PerfTraka support if you suspect unauthorized access, credential compromise, or misuse of an account.</p>
                <p class="mt-3">PerfTraka may suspend or restrict access where we reasonably believe an account has been compromised, misused, deactivated by an organization, or used in violation of these Terms.</p>
            </section>

            <section>
                <h2 class="text-xl font-bold text-[#111827]">5. Attendance, Site, and Location Features</h2>
                <p class="mt-3">PerfTraka may record check-ins, check-outs, scan rounds, QR or live tag scans, timestamps, site assignments, proximity information, uploaded images, and GPS coordinates where enabled by the organization.</p>
                <p class="mt-3">These features are provided for authorized workforce accountability, attendance validation, security patrol verification, operational oversight, reporting, and compliance support. PerfTraka does not authorize organizations or users to track people outside approved business workflows or outside the scope disclosed to affected users.</p>
                <p class="mt-3">Organizations remain responsible for obtaining any notices, consents, policies, approvals, or other legal bases required before using location, image, or monitoring features.</p>
            </section>

            <section>
                <h2 class="text-xl font-bold text-[#111827]">6. Incident Reports and User Content</h2>
                <p class="mt-3">Users may submit incident reports, photographs, comments, descriptions, and other operational records through the Service ("User Content"). You are responsible for ensuring that User Content is accurate, lawful, relevant to authorized operational purposes, and does not include unnecessary personal, confidential, offensive, or unlawful material.</p>
                <p class="mt-3">By submitting User Content, you grant PerfTraka the limited right to host, store, process, display, transmit, and use that content as necessary to provide, secure, support, and improve the Service and to make it available to authorized users of the relevant organization.</p>
                <p class="mt-3">PerfTraka does not claim ownership of User Content submitted by organizations or their users.</p>
            </section>

            <section>
                <h2 class="text-xl font-bold text-[#111827]">7. Acceptable Use</h2>
                <p class="mt-3">You must not misuse the Service. Prohibited activities include attempting to gain unauthorized access, bypassing security controls, interfering with service availability, uploading malicious code, scraping or extracting data without authorization, impersonating another person, falsifying attendance or incident records, reverse engineering the Service except where permitted by law, or using PerfTraka to violate another person's rights.</p>
                <p class="mt-3">You must not upload content that is unlawful, defamatory, discriminatory, threatening, invasive of privacy, sexually explicit, exploitative, or unrelated to legitimate operational reporting.</p>
            </section>

            <section>
                <h2 class="text-xl font-bold text-[#111827]">8. Privacy and Data Protection</h2>
                <p class="mt-3">PerfTraka's collection and processing of personal information is described in our <a href="{{ route('privacy-policy') }}" class="font-semibold text-[#226F65]">Privacy Policy</a>. By using the Service, you acknowledge that information may be collected and processed as described there.</p>
                <p class="mt-3">Organizations are responsible for ensuring that their use of PerfTraka complies with applicable privacy, employment, labor, data protection, and record retention laws. This includes providing appropriate notices to users and limiting access to personal information to authorized personnel.</p>
            </section>

            <section>
                <h2 class="text-xl font-bold text-[#111827]">9. Third-Party Services and Infrastructure</h2>
                <p class="mt-3">PerfTraka may rely on third-party providers for hosting, infrastructure, storage, analytics, communication, maps, security, payment processing, customer support, and related operations. Use of these providers is intended to support the availability, security, and functionality of the Service.</p>
                <p class="mt-3">Third-party services may be subject to their own terms and policies. PerfTraka is not responsible for third-party systems outside our reasonable control, but we will use reasonable care in selecting service providers that support the Service.</p>
            </section>

            <section>
                <h2 class="text-xl font-bold text-[#111827]">10. Fees, Subscriptions, and Client Agreements</h2>
                <p class="mt-3">Fees, billing periods, subscription plans, payment terms, renewal terms, taxes, support obligations, and service-specific commitments may be set out in a separate proposal, invoice, order form, statement of work, subscription plan, or written agreement between PerfTraka and the client organization.</p>
                <p class="mt-3">Unless otherwise agreed in writing, the organization is responsible for all fees associated with its use of the Service and for maintaining accurate billing and administrative information.</p>
            </section>

            <section>
                <h2 class="text-xl font-bold text-[#111827]">11. Intellectual Property</h2>
                <p class="mt-3">PerfTraka and its licensors retain all rights, title, and interest in the Service, including software, designs, dashboards, workflows, documentation, trademarks, logos, and related intellectual property.</p>
                <p class="mt-3">Subject to these Terms, PerfTraka grants authorized users a limited, non-exclusive, non-transferable, revocable right to access and use the Service for permitted business purposes. No rights are granted except as expressly stated in these Terms or a separate written agreement.</p>
            </section>

            <section>
                <h2 class="text-xl font-bold text-[#111827]">12. Service Availability and Changes</h2>
                <p class="mt-3">PerfTraka aims to provide a reliable and secure Service, but we do not guarantee that the Service will be uninterrupted, error-free, or available at all times. Access may be affected by maintenance, updates, connectivity, device issues, third-party services, security events, or circumstances beyond our reasonable control.</p>
                <p class="mt-3">We may update, modify, suspend, or discontinue parts of the Service from time to time. Where reasonably practical, we will provide notice of material changes that affect client organizations.</p>
            </section>

            <section>
                <h2 class="text-xl font-bold text-[#111827]">13. Security</h2>
                <p class="mt-3">PerfTraka uses reasonable technical and organizational safeguards designed to protect the Service and the information processed through it. These safeguards may include encrypted communication, access controls, authentication mechanisms, logging, cloud security controls, and administrative restrictions.</p>
                <p class="mt-3">No system can be guaranteed to be completely secure. Users and organizations must also take reasonable steps to protect accounts, devices, networks, and credentials.</p>
            </section>

            <section>
                <h2 class="text-xl font-bold text-[#111827]">14. Suspension and Termination</h2>
                <p class="mt-3">PerfTraka may suspend or terminate access to the Service if we reasonably believe that you or your organization have violated these Terms, created security or legal risk, failed to pay applicable fees, misused the Service, or used the Service in a way that may harm PerfTraka, users, client organizations, or third parties.</p>
                <p class="mt-3">Organizations may deactivate users through administrative controls where available. Individual users may request account deletion through the mobile application, their organization, or the process described in the <a href="{{ route('account-deletion') }}" class="font-semibold text-[#226F65]">Account Deletion</a> section of our Privacy Policy.</p>
                <p class="mt-3">After termination or deletion, certain records may be retained where required for legal, compliance, auditing, security, dispute resolution, backup, contractual, or legitimate operational purposes.</p>
            </section>

            <section>
                <h2 class="text-xl font-bold text-[#111827]">15. Disclaimers</h2>
                <p class="mt-3">The Service is provided on an "as is" and "as available" basis to the fullest extent permitted by law. PerfTraka does not warrant that the Service will meet every requirement of every organization, prevent all operational incidents, ensure employee compliance, replace professional judgment, or guarantee a particular business, security, HR, payroll, legal, or compliance outcome.</p>
                <p class="mt-3">PerfTraka is a technology platform. Organizations remain responsible for employment decisions, workplace policies, payroll calculations, disciplinary actions, security operations, compliance determinations, and any use of reports or analytics generated through the Service.</p>
            </section>

            <section>
                <h2 class="text-xl font-bold text-[#111827]">16. Limitation of Liability</h2>
                <p class="mt-3">To the fullest extent permitted by law, PerfTraka will not be liable for indirect, incidental, special, consequential, punitive, exemplary, or loss-of-profit damages arising from or related to use of the Service.</p>
                <p class="mt-3">Where liability cannot be excluded, PerfTraka's liability will be limited to the maximum extent permitted by applicable law and any separate written agreement between PerfTraka and the relevant client organization.</p>
            </section>

            <section>
                <h2 class="text-xl font-bold text-[#111827]">17. Indemnity</h2>
                <p class="mt-3">To the extent permitted by law, you and your organization agree to defend, indemnify, and hold PerfTraka harmless from claims, losses, liabilities, damages, costs, and expenses arising from misuse of the Service, violation of these Terms, unlawful monitoring or data processing, User Content, or violation of another person's rights.</p>
            </section>

            <section>
                <h2 class="text-xl font-bold text-[#111827]">18. Changes to These Terms</h2>
                <p class="mt-3">PerfTraka may update these Terms periodically. Updated Terms will be published on our website and will become effective when posted unless a later date is stated. Continued use of the Service after updates means you accept the revised Terms.</p>
            </section>

            <section>
                <h2 class="text-xl font-bold text-[#111827]">19. Contact</h2>
                <p class="mt-3">For questions about these Terms and Conditions, please contact PerfTraka through the website at <a href="https://perftraka.com#getInTouch" class="font-semibold text-[#226F65]">https://perftraka.com</a>.</p>
            </section>
        </div>
    </article>
</section>
@endsection

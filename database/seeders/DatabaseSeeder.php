<?php

namespace Database\Seeders;

use App\Models\AuditLog;
use App\Models\Client;
use App\Models\ClientSelection;
use App\Models\Investment;
use App\Models\LegalDocument;
use App\Models\Material;
use App\Models\Measurement;
use App\Models\Payment;
use App\Models\ProcurementItem;
use App\Models\Project;
use App\Models\ProjectUpdate;
use App\Models\RiskAssessment;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate([
            'email' => 'admin@gmail.com',
        ], [
            'name' => 'System Admin',
            'role' => 'admin',
            'password' => Hash::make('12345678'),
        ]);

        if (app()->environment('production')) {
            return;
        }

        $clients = collect([
            [
                'email' => 'amina.yusuf@gmail.com',
                'full_name' => 'Amina Yusuf',
                'gender' => 'Female',
                'phone' => '08030000000',
                'alternative_phone' => '07030000000',
                'occupation' => 'Entrepreneur',
                'employer' => 'AY Living Concepts',
                'monthly_income' => 4500000,
                'residential_address' => 'Lekki Phase 1, Lagos',
                'state' => 'Lagos',
                'lga' => 'Eti-Osa',
                'landmark' => 'Near Admiralty Circle',
                'house_ownership' => 'Owned',
                'status' => 'Active',
            ],
            [
                'email' => 'chinedu.okafor@gmail.com',
                'full_name' => 'Chinedu Okafor',
                'gender' => 'Male',
                'phone' => '08050000000',
                'occupation' => 'Oil & Gas Consultant',
                'employer' => 'PetroLink Advisory',
                'monthly_income' => 6200000,
                'residential_address' => 'GRA Phase 2, Port Harcourt',
                'state' => 'Rivers',
                'lga' => 'Port Harcourt',
                'landmark' => 'Near Isaac Boro Park',
                'house_ownership' => 'Owned',
                'status' => 'Active',
            ],
            [
                'email' => 'zainab.bello@gmail.com',
                'full_name' => 'Zainab Bello',
                'gender' => 'Female',
                'phone' => '08070000000',
                'occupation' => 'Civil Servant',
                'employer' => 'Federal Ministry of Works',
                'monthly_income' => 1800000,
                'residential_address' => 'Wuye District, Abuja',
                'state' => 'Abuja FCT',
                'lga' => 'Municipal Area Council',
                'landmark' => 'Close to Wuye Market',
                'house_ownership' => 'Rented',
                'status' => 'Prospect',
            ],
        ])->map(function (array $clientData): Client {
            return Client::query()->updateOrCreate(
                ['email' => $clientData['email']],
                $clientData,
            );
        })->values();

        foreach ($clients as $client) {
            User::query()->updateOrCreate([
                'email' => $client->email,
            ], [
                'name' => $client->full_name,
                'role' => 'client',
                'client_id' => $client->id,
                'password' => Hash::make('12345678'),
            ]);
        }

        $projects = collect([
            [
                'client' => $clients[0],
                'project_address' => 'Plot 12 Admiralty Way, Lekki, Lagos',
                'service_type' => 'New Build',
                'project_origin' => 'New Project',
                'building_type' => '5-Bedroom Duplex',
                'construction_stage' => 'Finishing',
                'current_progress_percent' => 72,
                'number_of_floors' => 2,
                'number_of_bedrooms' => 5,
                'finishing_works' => 'POP ceiling, kitchen fittings, wardrobes, smart lighting.',
                'client_objectives' => 'High-end family home with premium finish and phased monthly repayment.',
                'approved_area_sqm' => 420,
                'cost_per_sqm' => 850000,
                'estimated_completion_cost' => 357000000,
                'project_status' => 'In Progress',
            ],
            [
                'client' => $clients[1],
                'project_address' => 'Peter Odili Road, Port Harcourt',
                'service_type' => 'Completion Finance',
                'project_origin' => 'Partially Built',
                'building_type' => 'Terrace Apartments',
                'construction_stage' => 'Roofing',
                'current_progress_percent' => 54,
                'number_of_floors' => 3,
                'number_of_bedrooms' => 8,
                'finishing_works' => 'Roof completion, external plastering, electrical first fix.',
                'client_objectives' => 'Complete a stalled investment property and open two units for rent within 9 months.',
                'approved_area_sqm' => 610,
                'cost_per_sqm' => 780000,
                'estimated_completion_cost' => 475800000,
                'project_status' => 'In Progress',
            ],
            [
                'client' => $clients[2],
                'project_address' => 'Mabushi Extension, Abuja',
                'service_type' => 'Design & Build',
                'project_origin' => 'New Project',
                'building_type' => '4-Bedroom Bungalow',
                'construction_stage' => 'Planning',
                'current_progress_percent' => 12,
                'number_of_floors' => 1,
                'number_of_bedrooms' => 4,
                'finishing_works' => 'Client still deciding tiles, kitchen quality, and external landscape.',
                'client_objectives' => 'Affordable but modern personal residence with flexible contractor-led financing.',
                'approved_area_sqm' => 250,
                'cost_per_sqm' => 690000,
                'estimated_completion_cost' => 172500000,
                'project_status' => 'Registered',
            ],
        ])->map(function (array $projectData): Project {
            $client = $projectData['client'];
            unset($projectData['client']);

            return Project::query()->updateOrCreate(
                ['project_address' => $projectData['project_address']],
                array_merge($projectData, ['client_id' => $client->id]),
            );
        })->values();

        $suppliers = collect([
            [
                'supplier_name' => 'Prime Build Supplies',
                'contact_person' => 'Kunle Adeyemi',
                'phone' => '08040000000',
                'email' => 'primebuild@gmail.com',
                'category' => 'Steel & Reinforcement',
                'address' => 'Dopemu, Lagos',
                'status' => 'Active',
            ],
            [
                'supplier_name' => 'Eastern Cement Hub',
                'contact_person' => 'Ngozi Eze',
                'phone' => '08041000000',
                'email' => 'easterncement@gmail.com',
                'category' => 'Cement & Concrete',
                'address' => 'Trans-Amadi, Port Harcourt',
                'status' => 'Active',
            ],
            [
                'supplier_name' => 'Capital Finishings Depot',
                'contact_person' => 'Suleiman Haruna',
                'phone' => '08042000000',
                'email' => 'capitalfinishings@gmail.com',
                'category' => 'Finishing Materials',
                'address' => 'Gwarinpa, Abuja',
                'status' => 'Active',
            ],
        ])->map(fn (array $supplierData): Supplier => Supplier::query()->updateOrCreate(
            ['supplier_name' => $supplierData['supplier_name']],
            $supplierData,
        ))->values();

        Measurement::query()->updateOrCreate([
            'project_id' => $projects[0]->id,
        ], [
            'client_ground_floor_sqm' => 200,
            'client_first_floor_sqm' => 180,
            'client_other_floor_sqm' => 20,
            'engineer_ground_floor_sqm' => 210,
            'engineer_first_floor_sqm' => 185,
            'engineer_other_floor_sqm' => 15,
            'approved_area_sqm' => 410,
            'measurement_status' => 'Verified',
            'engineer_remarks' => 'Slight variance from client submission after site verification.',
        ]);

        Measurement::query()->updateOrCreate([
            'project_id' => $projects[1]->id,
        ], [
            'client_ground_floor_sqm' => 220,
            'client_first_floor_sqm' => 200,
            'client_other_floor_sqm' => 170,
            'engineer_ground_floor_sqm' => 225,
            'engineer_first_floor_sqm' => 198,
            'engineer_other_floor_sqm' => 168,
            'approved_area_sqm' => 591,
            'measurement_status' => 'Approved',
            'engineer_remarks' => 'Approved for roofing and finishing budget release.',
        ]);

        Investment::query()->updateOrCreate([
            'project_id' => $projects[0]->id,
        ], [
            'estimated_cost' => 357000000,
            'client_initial_contribution' => 100000000,
            'contractor_investment' => 257000000,
            'financing_mode' => 'Contractor Finance',
            'client_proposed_profit_margin' => 18,
            'admin_approved_profit_margin' => 16,
            'profit_margin_status' => 'approved',
            'repayment_duration_months' => 18,
            'payment_day' => '25th',
            'payment_method' => 'Bank Transfer',
            'payment_plan_status' => 'approved',
        ]);

        Investment::query()->updateOrCreate([
            'project_id' => $projects[1]->id,
        ], [
            'estimated_cost' => 475800000,
            'client_initial_contribution' => 185000000,
            'contractor_investment' => 290800000,
            'financing_mode' => 'Completion Finance',
            'client_proposed_profit_margin' => 20,
            'admin_approved_profit_margin' => 17.5,
            'profit_margin_status' => 'countered',
            'admin_profit_note' => 'Countered to align with current market volatility.',
            'repayment_duration_months' => 24,
            'payment_day' => '15th',
            'payment_method' => 'Direct Debit',
            'payment_plan_status' => 'countered',
        ]);

        Investment::query()->updateOrCreate([
            'project_id' => $projects[2]->id,
        ], [
            'estimated_cost' => 172500000,
            'client_initial_contribution' => 35000000,
            'contractor_investment' => 137500000,
            'financing_mode' => 'Progressive Drawdown',
            'client_proposed_profit_margin' => 15,
            'profit_margin_status' => 'pending',
            'repayment_duration_months' => 20,
            'payment_day' => '10th',
            'payment_method' => 'Bank Transfer',
            'payment_plan_status' => 'proposed',
        ]);

        Material::query()->updateOrCreate([
            'project_id' => $projects[0]->id,
            'material_name' => 'Reinforcement Steel',
        ], [
            'supplier_responsibility' => 'Contractor Supplies',
            'estimated_cost' => 18000000,
            'delivery_status' => 'Scheduled',
        ]);

        Material::query()->updateOrCreate([
            'project_id' => $projects[1]->id,
            'material_name' => 'Cement',
        ], [
            'supplier_responsibility' => 'Shared Supply',
            'estimated_cost' => 24000000,
            'delivery_status' => 'Delivered',
        ]);

        Material::query()->updateOrCreate([
            'project_id' => $projects[2]->id,
            'material_name' => 'Floor Tiles',
        ], [
            'supplier_responsibility' => 'Client Supplies',
            'estimated_cost' => 9500000,
            'delivery_status' => 'Pending',
        ]);

        ProcurementItem::query()->updateOrCreate([
            'project_id' => $projects[0]->id,
            'item_name' => 'Cement',
        ], [
            'supplier_id' => $suppliers[1]->id,
            'quantity' => 600,
            'unit' => 'bags',
            'unit_price' => 13000,
            'procurement_status' => 'Approved',
            'request_type' => 'Purchase Order',
        ]);

        ProcurementItem::query()->updateOrCreate([
            'project_id' => $projects[1]->id,
            'item_name' => '16mm Rods',
        ], [
            'supplier_id' => $suppliers[0]->id,
            'quantity' => 12,
            'unit' => 'tons',
            'unit_price' => 1650000,
            'procurement_status' => 'Ordered',
            'request_type' => 'Purchase Order',
        ]);

        ProcurementItem::query()->updateOrCreate([
            'project_id' => $projects[2]->id,
            'item_name' => 'Spanish Floor Tiles',
        ], [
            'supplier_id' => $suppliers[2]->id,
            'quantity' => 900,
            'unit' => 'sqm',
            'unit_price' => 18500,
            'procurement_status' => 'Requested',
            'request_type' => 'Purchase Requisition',
        ]);

        Payment::query()->updateOrCreate([
            'project_id' => $projects[0]->id,
            'reference_number' => 'BV360-PMT-001',
        ], [
            'amount_paid' => 15000000,
            'payment_date' => now()->subDays(12)->toDateString(),
            'payment_method' => 'Bank Transfer',
        ]);

        Payment::query()->updateOrCreate([
            'project_id' => $projects[0]->id,
            'reference_number' => 'BV360-PMT-002',
        ], [
            'amount_paid' => 18500000,
            'payment_date' => now()->subDays(4)->toDateString(),
            'payment_method' => 'POS',
        ]);

        Payment::query()->updateOrCreate([
            'project_id' => $projects[1]->id,
            'reference_number' => 'BV360-PMT-003',
        ], [
            'amount_paid' => 25000000,
            'payment_date' => now()->subDays(8)->toDateString(),
            'payment_method' => 'Bank Transfer',
        ]);

        LegalDocument::query()->updateOrCreate([
            'project_id' => $projects[0]->id,
            'document_title' => 'Investment Participation Agreement',
        ], [
            'document_type' => 'Agreement',
            'legal_status' => 'Under Review',
            'legal_officer' => 'In-house Counsel',
            'admin_approved' => true,
        ]);

        LegalDocument::query()->updateOrCreate([
            'project_id' => $projects[1]->id,
            'document_title' => 'Procurement Guarantee Letter',
        ], [
            'document_type' => 'Guarantee',
            'legal_status' => 'Approved',
            'legal_officer' => 'External Solicitor',
            'admin_approved' => true,
            'client_signed' => true,
        ]);

        $updates = [
            [
                'project_id' => $projects[0]->id,
                'title' => 'Kitchen and POP installation underway',
                'stage' => 'Finishing',
                'progress_percent' => 72,
                'update_date' => now()->subDays(3)->toDateString(),
                'summary' => 'Ceiling framing is complete and kitchen cabinet carcasses are being installed.',
                'next_steps' => 'Finalize kitchen fittings, paint corrections, and wardrobe doors.',
                'client_visible' => true,
            ],
            [
                'project_id' => $projects[0]->id,
                'title' => 'Electrical second fix completed',
                'stage' => 'Electrical',
                'progress_percent' => 64,
                'update_date' => now()->subDays(12)->toDateString(),
                'summary' => 'Switches, sockets, and distribution board have been fixed for the main building.',
                'next_steps' => 'Smart light fittings and external lighting installation.',
                'client_visible' => true,
            ],
            [
                'project_id' => $projects[1]->id,
                'title' => 'Roof trusses completed',
                'stage' => 'Roofing',
                'progress_percent' => 54,
                'update_date' => now()->subDays(5)->toDateString(),
                'summary' => 'Roof truss fabrication and installation completed across the block of terraces.',
                'next_steps' => 'Install long-span aluminium sheets and begin external plastering.',
                'client_visible' => true,
            ],
            [
                'project_id' => $projects[2]->id,
                'title' => 'Concept and budget alignment session held',
                'stage' => 'Planning',
                'progress_percent' => 12,
                'update_date' => now()->subDays(2)->toDateString(),
                'summary' => 'Client and contractor aligned on room schedule, cost band, and financing expectation.',
                'next_steps' => 'Freeze selections and validate affordability for formal approval.',
                'client_visible' => true,
            ],
        ];

        foreach ($updates as $update) {
            ProjectUpdate::query()->updateOrCreate([
                'project_id' => $update['project_id'],
                'title' => $update['title'],
            ], $update);
        }

        $selections = [
            [
                'project_id' => $projects[0]->id,
                'client_id' => $clients[0]->id,
                'category' => 'Kitchen Finish',
                'item_name' => 'Cabinet Finish',
                'selected_option' => 'Matte Walnut Veneer',
                'budget_amount' => 4800000,
                'decision_deadline' => now()->addDays(7)->toDateString(),
                'client_notes' => 'Client prefers premium but easy-to-clean finish.',
                'admin_notes' => 'Approved within finish budget.',
                'status' => 'approved',
            ],
            [
                'project_id' => $projects[1]->id,
                'client_id' => $clients[1]->id,
                'category' => 'External Works',
                'item_name' => 'Interlocking Stones',
                'selected_option' => '6-inch Heavy Duty Interlock',
                'budget_amount' => 9200000,
                'decision_deadline' => now()->addDays(5)->toDateString(),
                'client_notes' => 'Durability is more important than pattern.',
                'admin_notes' => 'Need revised quantity confirmation before approval.',
                'status' => 'revision_requested',
            ],
            [
                'project_id' => $projects[2]->id,
                'client_id' => $clients[2]->id,
                'category' => 'Floor Finish',
                'item_name' => 'Living Room Tiles',
                'selected_option' => 'Spanish Porcelain 60x120',
                'budget_amount' => 11500000,
                'decision_deadline' => now()->addDays(10)->toDateString(),
                'client_notes' => 'Would like a modern grey marble look.',
                'status' => 'pending',
            ],
        ];

        foreach ($selections as $selection) {
            ClientSelection::query()->updateOrCreate([
                'project_id' => $selection['project_id'],
                'item_name' => $selection['item_name'],
            ], $selection);
        }

        $riskAssessments = [
            [
                'project_id' => $projects[0]->id,
                'client_id' => $clients[0]->id,
                'affordability_score' => 82,
                'project_readiness_score' => 88,
                'equity_commitment_score' => 75,
                'risk_level' => 'low',
                'recommendation' => 'approve',
                'rationale' => 'Strong equity contribution, consistent income profile, and mature project stage lower repayment risk.',
                'assessed_at' => now()->subDays(6)->toDateString(),
                'client_visible' => true,
            ],
            [
                'project_id' => $projects[1]->id,
                'client_id' => $clients[1]->id,
                'affordability_score' => 68,
                'project_readiness_score' => 70,
                'equity_commitment_score' => 64,
                'risk_level' => 'medium',
                'recommendation' => 'review',
                'rationale' => 'Project is viable but current contractor exposure and revised quantities require additional monitoring.',
                'assessed_at' => now()->subDays(4)->toDateString(),
                'client_visible' => true,
            ],
            [
                'project_id' => $projects[2]->id,
                'client_id' => $clients[2]->id,
                'affordability_score' => 49,
                'project_readiness_score' => 55,
                'equity_commitment_score' => 42,
                'risk_level' => 'high',
                'recommendation' => 'reject',
                'rationale' => 'Funding request is ahead of project readiness and client contribution threshold is still weak for current pricing.',
                'assessed_at' => now()->subDays(1)->toDateString(),
                'client_visible' => true,
            ],
        ];

        foreach ($riskAssessments as $riskAssessment) {
            RiskAssessment::query()->updateOrCreate([
                'project_id' => $riskAssessment['project_id'],
                'assessed_at' => $riskAssessment['assessed_at'],
            ], $riskAssessment);
        }

        $logs = [
            [
                'user_type' => 'Admin',
                'user_name' => 'System Admin',
                'action' => 'Created update',
                'module' => 'Project Updates',
                'record_reference' => $projects[0]->project_id,
                'new_values' => json_encode(['title' => 'Kitchen and POP installation underway']),
                'ip_address' => '127.0.0.1',
            ],
            [
                'user_type' => 'Finance Team',
                'user_name' => 'System Admin',
                'action' => 'Reviewed risk',
                'module' => 'Risk Assessment',
                'record_reference' => $projects[1]->project_id,
                'new_values' => json_encode(['recommendation' => 'review']),
                'ip_address' => '127.0.0.1',
            ],
            [
                'user_type' => 'Project Admin',
                'user_name' => 'System Admin',
                'action' => 'Approved selection',
                'module' => 'Client Selections',
                'record_reference' => $projects[0]->project_id,
                'new_values' => json_encode(['status' => 'approved']),
                'ip_address' => '127.0.0.1',
            ],
        ];

        foreach ($logs as $log) {
            AuditLog::query()->updateOrCreate([
                'module' => $log['module'],
                'record_reference' => $log['record_reference'],
                'action' => $log['action'],
            ], $log);
        }
    }
}

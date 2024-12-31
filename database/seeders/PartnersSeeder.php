<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartnersSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        // DB::table('partners')->delete();
        
        DB::table('partners')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'AIA Singapore Pte Ltd',
                'web_url' => 'https://www.aia.com.sg/en/index.html',
                'web_logo' => '1676443000.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-14 22:36:40',
                'updated_at' => '2023-02-15 07:16:11',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'AXA Insurance Pte Ltd',
                'web_url' => 'https://www.insurance.hsbclife.com.sg/',
                'web_logo' => '1676445148.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-14 23:12:28',
                'updated_at' => '2023-02-15 07:16:12',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Great Eastern Life Assurance Company Limited',
                'web_url' => 'https://www.greateasternlife.com/sg/en/personal-insurance.html',
                'web_logo' => '1676445267.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-14 23:14:27',
                'updated_at' => '2023-02-14 23:14:27',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Liberty Insurance Pte Ltd',
                'web_url' => 'https://www.libertyinsurance.com.sg/',
                'web_logo' => '1676445303.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-14 23:15:03',
                'updated_at' => '2023-02-14 23:15:03',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'NTUC Income Insurance Co-Operative Limited',
                'web_url' => 'https://www.income.com.sg/',
                'web_logo' => '1676445432.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-14 23:17:12',
                'updated_at' => '2023-02-14 23:17:12',
            ),
            5 => 
            array (
                'id' => 6,
            'name' => 'QBE Insurance (Singapore) Ltd',
                'web_url' => 'https://www.qbe.com/sg',
                'web_logo' => '1676445750.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-14 23:22:30',
                'updated_at' => '2023-02-14 23:22:30',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Raffles Health Insurance Pte Ltd',
                'web_url' => 'https://www.raffleshealthinsurance.com/',
                'web_logo' => '1676445764.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-14 23:22:44',
                'updated_at' => '2023-02-14 23:22:44',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Singapore Life Pte Ltd',
                'web_url' => 'https://singlife.com/en',
                'web_logo' => '1676445780.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-14 23:23:00',
                'updated_at' => '2023-02-14 23:23:00',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Tokio Marine Life Insurance Singapore Ltd',
                'web_url' => 'https://www.tokiomarine.com/sg/en/life.html',
                'web_logo' => '1676445790.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-14 23:23:10',
                'updated_at' => '2023-02-14 23:23:10',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'DBS Bank Ltd, Enterprise Banking',
                'web_url' => 'https://www.dbs.com.sg/index/default.page',
                'web_logo' => '1676446317.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-14 23:31:57',
                'updated_at' => '2023-02-14 23:31:57',
            ),
            10 => 
            array (
                'id' => 14,
            'name' => 'Aetna Insurance (Singapore) Pte Ltd',
                'web_url' => NULL,
                'web_logo' => '1676453077.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-15 01:24:37',
                'updated_at' => '2023-02-15 01:24:37',
            ),
            11 => 
            array (
                'id' => 15,
                'name' => 'AIG Asia Pacific Insurance Pte Ltd',
                'web_url' => 'https://www.aig.sg/personal',
                'web_logo' => '1676453120.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-15 01:25:20',
                'updated_at' => '2023-02-15 01:25:20',
            ),
            12 => 
            array (
                'id' => 16,
                'name' => 'AVIVA Ltd',
                'web_url' => NULL,
                'web_logo' => '1676453170.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-15 01:26:10',
                'updated_at' => '2023-02-15 01:26:10',
            ),
            13 => 
            array (
                'id' => 17,
            'name' => 'CIGNA Europe Insurance Company (Singapore Branch)',
                'web_url' => 'https://www.cigna.com.sg/',
                'web_logo' => '1676453222.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-15 01:27:02',
                'updated_at' => '2023-02-15 01:27:02',
            ),
            14 => 
            array (
                'id' => 18,
            'name' => 'MSIG Insurance (Singapore) Pte Ltd',
                'web_url' => 'https://www.msig.com.sg/',
                'web_logo' => '1676453353.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-15 01:29:13',
                'updated_at' => '2023-02-15 01:29:13',
            ),
            15 => 
            array (
                'id' => 19,
            'name' => 'Tenet Sompo Insurance Pte Ltd (NOW Health as MGA)',
                'web_url' => NULL,
                'web_logo' => '1676453370.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-15 01:29:30',
                'updated_at' => '2023-02-15 01:29:30',
            ),
            16 => 
            array (
                'id' => 20,
                'name' => 'ANZ Banking Group Limited',
                'web_url' => 'https://www.anz.com/institutional/global/singapore/en/',
                'web_logo' => '1676536514.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 00:35:15',
                'updated_at' => '2023-02-16 00:35:15',
            ),
            17 => 
            array (
                'id' => 21,
                'name' => 'CIMB Bank Berhad',
                'web_url' => 'https://www.cimb.com.sg/en/personal/home.html',
                'web_logo' => '1676536575.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 00:36:15',
                'updated_at' => '2023-02-16 00:36:15',
            ),
            18 => 
            array (
                'id' => 22,
                'name' => 'Citibank Singapore Ltd',
                'web_url' => 'https://www.citibank.com.sg/portal/bluehome/index.htm',
                'web_logo' => '1676536611.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 00:36:51',
                'updated_at' => '2023-02-16 00:36:51',
            ),
            19 => 
            array (
                'id' => 23,
            'name' => 'HSBC Bank (Singapore) Limited',
                'web_url' => 'https://www.insurance.hsbc.com.sg/',
                'web_logo' => '1676536634.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 00:37:14',
                'updated_at' => '2023-02-16 00:37:14',
            ),
            20 => 
            array (
                'id' => 24,
                'name' => 'Malayan Banking Berhad',
                'web_url' => 'https://www.maybank2u.com.sg/en/personal/index.page',
                'web_logo' => '1676536642.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 00:37:22',
                'updated_at' => '2023-02-16 00:37:22',
            ),
            21 => 
            array (
                'id' => 25,
                'name' => 'OCBC Bank',
                'web_url' => 'https://www.ocbc.com/group/gateway.page',
                'web_logo' => '1676536665.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 00:37:45',
                'updated_at' => '2023-02-16 00:37:45',
            ),
            22 => 
            array (
                'id' => 26,
            'name' => 'Standard Chartered Bank (Singapore) Limited',
                'web_url' => 'https://www.sc.com/sg/',
                'web_logo' => '1676536681.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 00:38:01',
                'updated_at' => '2023-02-16 00:38:01',
            ),
            23 => 
            array (
                'id' => 27,
                'name' => 'United Overseas Bank Limited',
                'web_url' => NULL,
                'web_logo' => '1676536692.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 00:38:12',
                'updated_at' => '2023-02-16 09:44:11',
            ),
            24 => 
            array (
                'id' => 28,
                'name' => 'iCompareLoans',
                'web_url' => 'https://icompareloan.com/',
                'web_logo' => '1676536700.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 00:38:20',
                'updated_at' => '2023-02-16 00:38:20',
            ),
            25 => 
            array (
                'id' => 29,
                'name' => 'BNP Privalto',
                'web_url' => NULL,
                'web_logo' => '1676536964.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 00:42:44',
                'updated_at' => '2023-02-16 00:42:44',
            ),
            26 => 
            array (
                'id' => 30,
                'name' => 'Canaccord Genuity Wealth Management',
                'web_url' => NULL,
                'web_logo' => '1676536970.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 00:42:50',
                'updated_at' => '2023-02-16 00:42:50',
            ),
            27 => 
            array (
                'id' => 31,
                'name' => 'Commerzbank Corporates',
                'web_url' => 'https://www.commerzbank.sg/portal/en/cb/sg/firmenkunden/our_presence_your_benefits_sg.html',
                'web_logo' => '1676537003.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 00:43:23',
                'updated_at' => '2023-02-16 00:43:23',
            ),
            28 => 
            array (
                'id' => 32,
                'name' => 'EFG Bank',
                'web_url' => 'https://www.ascendas-singbridge.com/en/our-properties/singapore/office-and-commercial/79-robinson-road/',
                'web_logo' => '1676537014.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 00:43:34',
                'updated_at' => '2023-02-16 00:43:34',
            ),
            29 => 
            array (
                'id' => 33,
                'name' => 'Exane Derivatives',
                'web_url' => NULL,
                'web_logo' => '1676537026.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 00:43:46',
                'updated_at' => '2023-02-16 00:43:46',
            ),
            30 => 
            array (
                'id' => 34,
                'name' => 'IDAD Limited',
                'web_url' => NULL,
                'web_logo' => '1676537054.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 00:44:14',
                'updated_at' => '2023-02-16 00:44:14',
            ),
            31 => 
            array (
                'id' => 35,
                'name' => 'Société Générale',
                'web_url' => NULL,
                'web_logo' => '1676537063.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 00:44:23',
                'updated_at' => '2023-02-16 00:44:23',
            ),
            32 => 
            array (
                'id' => 36,
            'name' => 'TMF Group (Formerly Equity Trust)',
                'web_url' => 'https://www.tmf-group.com/',
                'web_logo' => '1676537073.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 00:44:33',
                'updated_at' => '2023-02-16 00:44:33',
            ),
            33 => 
            array (
                'id' => 37,
                'name' => 'Belmont Investments',
                'web_url' => 'https://www.companies.sg/business/200000212C/BELMONT-INVESTMENT-PTE-LTD',
                'web_logo' => '1676538152.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:02:32',
                'updated_at' => '2023-02-16 01:02:32',
            ),
            34 => 
            array (
                'id' => 38,
                'name' => 'Coral Portfolio Ltd',
                'web_url' => NULL,
                'web_logo' => NULL,
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:02:36',
                'updated_at' => '2023-02-16 01:02:36',
            ),
            35 => 
            array (
                'id' => 39,
                'name' => 'Parry Fund Services',
                'web_url' => NULL,
                'web_logo' => NULL,
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:02:40',
                'updated_at' => '2023-02-16 01:02:40',
            ),
            36 => 
            array (
                'id' => 40,
            'name' => 'Firstmac Limited (Singapore Branch)',
                'web_url' => 'https://www.companies.sg/business/T12FC0152K/FIRSTMAC-LIMITED-SINGAPORE-BRANCH-',
                'web_logo' => '1676538176.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:02:56',
                'updated_at' => '2023-02-16 01:02:56',
            ),
            37 => 
            array (
                'id' => 41,
                'name' => 'Friends Provident International',
                'web_url' => 'https://www.fpinternational.sg/',
                'web_logo' => '1676538184.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:03:04',
                'updated_at' => '2023-02-16 01:03:04',
            ),
            38 => 
            array (
                'id' => 42,
                'name' => 'Generali International',
                'web_url' => NULL,
                'web_logo' => '1676538206.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:03:26',
                'updated_at' => '2023-02-16 09:05:16',
            ),
            39 => 
            array (
                'id' => 43,
                'name' => 'Old Mutual International',
                'web_url' => NULL,
                'web_logo' => '1676538219.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:03:39',
                'updated_at' => '2023-02-16 01:03:39',
            ),
            40 => 
            array (
                'id' => 44,
                'name' => 'SHK Fund Management',
                'web_url' => NULL,
                'web_logo' => '1676538381.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:06:21',
                'updated_at' => '2023-02-16 01:06:21',
            ),
            41 => 
            array (
                'id' => 45,
                'name' => 'Sundaram Asset Management Pte Ltd',
                'web_url' => 'https://www.sundarammutual.sg/Home
',
                'web_logo' => '1676538388.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:06:28',
                'updated_at' => '2023-02-16 09:06:43',
            ),
            42 => 
            array (
                'id' => 46,
                'name' => 'UOB Kay Hian Pte Ltd',
                'web_url' => NULL,
                'web_logo' => '1676538435.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:07:15',
                'updated_at' => '2023-02-16 01:07:15',
            ),
            43 => 
            array (
                'id' => 47,
            'name' => 'Superfund Financial (Singapore) Pte Ltd',
                'web_url' => NULL,
                'web_logo' => NULL,
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:07:19',
                'updated_at' => '2023-02-16 01:07:19',
            ),
            44 => 
            array (
                'id' => 48,
            'name' => 'The Premier Group (Isle of Man) Limited',
                'web_url' => NULL,
                'web_logo' => NULL,
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:07:25',
                'updated_at' => '2023-02-16 01:07:25',
            ),
            45 => 
            array (
                'id' => 49,
                'name' => 'The Synergy Partnership',
                'web_url' => NULL,
                'web_logo' => '1676538489.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:08:09',
                'updated_at' => '2023-02-16 01:08:09',
            ),
            46 => 
            array (
                'id' => 50,
            'name' => 'China Life Insurance (Singapore) Pte Ltd',
                'web_url' => 'https://www.chinalife.com.sg/en',
                'web_logo' => '1676538945.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:15:45',
                'updated_at' => '2023-02-16 01:15:45',
            ),
            47 => 
            array (
                'id' => 51,
            'name' => 'China Taiping Insurance (Singapore) Pte Ltd',
                'web_url' => 'https://www.sg.cntaiping.com/en/',
                'web_logo' => '1676538954.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:15:54',
                'updated_at' => '2023-02-16 01:15:54',
            ),
            48 => 
            array (
                'id' => 52,
                'name' => 'Etiqa Insurance Pte Ltd',
                'web_url' => 'https://www.etiqa.com.sg/',
                'web_logo' => '1676538964.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:16:04',
                'updated_at' => '2023-02-16 01:16:04',
            ),
            49 => 
            array (
                'id' => 53,
            'name' => 'HSBC Insurance (Singapore) Pte Limited',
                'web_url' => 'https://www.insurance.hsbc.com.sg/',
                'web_logo' => '1676538976.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:16:16',
                'updated_at' => '2023-02-16 01:16:16',
            ),
            50 => 
            array (
                'id' => 54,
            'name' => 'Life Insurance Corporation (Singapore) Pte Ltd',
                'web_url' => 'https://www.licsingapore.com/',
                'web_logo' => '1676538998.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:16:38',
                'updated_at' => '2023-02-16 01:16:38',
            ),
            51 => 
            array (
                'id' => 55,
            'name' => 'Manulife (Singapore) Private Limited',
                'web_url' => 'https://www.manulife.com.sg/',
                'web_logo' => '1676539011.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:16:51',
                'updated_at' => '2023-02-16 01:16:51',
            ),
            52 => 
            array (
                'id' => 56,
                'name' => 'Quilter International',
                'web_url' => 'https://www.quilterinternational.com/',
                'web_logo' => '1676539111.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:18:31',
                'updated_at' => '2023-02-16 01:18:31',
            ),
            53 => 
            array (
                'id' => 57,
                'name' => 'Singlife',
                'web_url' => 'https://singlife.com/en',
                'web_logo' => '1676539211.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:20:11',
                'updated_at' => '2023-02-16 01:20:11',
            ),
            54 => 
            array (
                'id' => 58,
                'name' => 'Transamerica Life Bermuda Ltd',
                'web_url' => 'https://www.transamericalifebermuda.com/en/home/',
                'web_logo' => '1676539260.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:21:00',
                'updated_at' => '2023-02-16 01:21:00',
            ),
            55 => 
            array (
                'id' => 59,
                'name' => 'FWD Insurance',
                'web_url' => NULL,
                'web_logo' => '1676539266.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:21:06',
                'updated_at' => '2023-02-16 01:21:06',
            ),
            56 => 
            array (
                'id' => 60,
            'name' => 'Swiss Life (Singapore) Pte Ltd',
                'web_url' => 'https://www.swisslife-global.com/global-solutions.html',
                'web_logo' => '1676539331.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:22:11',
                'updated_at' => '2023-02-16 01:22:11',
            ),
            57 => 
            array (
                'id' => 61,
                'name' => 'Utmost Worldwide Limited',
                'web_url' => 'https://utmostinternational.com/',
                'web_logo' => '1676539348.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:22:28',
                'updated_at' => '2023-02-16 01:22:28',
            ),
            58 => 
            array (
                'id' => 62,
                'name' => 'Allianz Insurance Singapore Pte Ltd',
                'web_url' => 'https://www.allianz-asiapacific.com/',
                'web_logo' => '1676539513.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:25:14',
                'updated_at' => '2023-02-16 01:25:14',
            ),
            59 => 
            array (
                'id' => 63,
            'name' => 'Allianz Global Corporate (Singapore Branch)',
                'web_url' => 'https://www.allianz.sg/',
                'web_logo' => '1676539542.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:25:42',
                'updated_at' => '2023-02-16 01:25:42',
            ),
            60 => 
            array (
                'id' => 64,
            'name' => 'Allied World Assurance Company Ltd (Singapore Branch)',
                'web_url' => 'https://awac.com/',
                'web_logo' => '1676539583.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:26:23',
                'updated_at' => '2023-02-16 01:26:23',
            ),
            61 => 
            array (
                'id' => 65,
                'name' => 'Atradius Credit Insurance N.V.',
                'web_url' => 'https://group.atradius.com/',
                'web_logo' => '1676539590.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:26:30',
                'updated_at' => '2023-02-16 01:26:30',
            ),
            62 => 
            array (
                'id' => 66,
                'name' => 'Beazley Pte Ltd',
                'web_url' => 'https://www.beazley.com/en-sg',
                'web_logo' => '1676539654.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:27:34',
                'updated_at' => '2023-02-16 01:27:34',
            ),
            63 => 
            array (
                'id' => 67,
                'name' => 'Berkley Insurance Asia',
                'web_url' => 'https://berkleyasia.com/',
                'web_logo' => '1676539666.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:27:46',
                'updated_at' => '2023-02-16 01:27:46',
            ),
            64 => 
            array (
                'id' => 68,
                'name' => 'Berkshire Hathaway Specialty Insurance Company',
                'web_url' => 'https://bhspecialty.com/',
                'web_logo' => '1676539675.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:27:55',
                'updated_at' => '2023-02-16 01:27:55',
            ),
            65 => 
            array (
                'id' => 69,
                'name' => 'Catlin Singapore Pte Ltd',
                'web_url' => 'https://axaxl.com/insurance',
                'web_logo' => NULL,
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:28:06',
                'updated_at' => '2023-02-16 01:28:06',
            ),
            66 => 
            array (
                'id' => 70,
                'name' => 'Chubb Insurance Singapore Limited',
                'web_url' => 'https://www.chubb.com/sg-en/',
                'web_logo' => '1676539694.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:28:14',
                'updated_at' => '2023-02-16 01:28:14',
            ),
            67 => 
            array (
                'id' => 71,
                'name' => 'Coface Singapore',
                'web_url' => 'https://www.coface.com.sg/',
                'web_logo' => '1676539710.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:28:30',
                'updated_at' => '2023-02-16 01:28:30',
            ),
            68 => 
            array (
                'id' => 72,
                'name' => 'Great American Insurance Company – Singapore Branch',
                'web_url' => 'https://www.greatamericaninsurancegroup.com/',
                'web_logo' => '1676539864.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:31:04',
                'updated_at' => '2023-02-16 01:31:04',
            ),
            69 => 
            array (
                'id' => 73,
                'name' => 'First Capital Insurance Ltd',
                'web_url' => 'https://www.msfirstcapital.com.sg/',
                'web_logo' => '1676539925.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:32:05',
                'updated_at' => '2023-02-16 01:32:05',
            ),
            70 => 
            array (
                'id' => 74,
                'name' => 'Groupama Transport Singapore Branch',
                'web_url' => 'http://www.groupama.com.hk/about/transport.htm',
                'web_logo' => '1676539953.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:32:33',
                'updated_at' => '2023-02-16 01:32:33',
            ),
            71 => 
            array (
                'id' => 75,
                'name' => 'Hong Leong Assurance Pte Ltd',
                'web_url' => 'https://www.hlas.com.sg/',
                'web_logo' => '1676539970.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:32:50',
                'updated_at' => '2023-02-16 01:32:50',
            ),
            72 => 
            array (
                'id' => 76,
            'name' => 'Euler Hermes Credit Insurance Agency (S) Pte Ltd - Singapore Branch',
                'web_url' => 'https://www.allianz-trade.com/en_SG.html',
                'web_logo' => '1676539981.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:33:01',
                'updated_at' => '2023-02-16 01:33:01',
            ),
            73 => 
            array (
                'id' => 77,
                'name' => 'Convex Insurance UK Ltd',
                'web_url' => 'https://convexin.com/',
                'web_logo' => '1676540032.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:33:52',
                'updated_at' => '2023-02-16 01:33:52',
            ),
            74 => 
            array (
                'id' => 78,
                'name' => 'Delta Underwriting Private Limited',
                'web_url' => 'https://deltaunderwriting.com/',
                'web_logo' => '1676540055.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:34:15',
                'updated_at' => '2023-02-16 01:34:15',
            ),
            75 => 
            array (
                'id' => 79,
                'name' => 'ECICS Limited',
                'web_url' => 'https://www.ecics.com.sg/',
                'web_logo' => '1676540066.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:34:26',
                'updated_at' => '2023-02-16 01:34:26',
            ),
            76 => 
            array (
                'id' => 80,
                'name' => 'EQ Insurance Company Limited',
                'web_url' => 'https://www.eqinsurance.com.sg/',
                'web_logo' => '1676540077.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:34:37',
                'updated_at' => '2023-02-16 01:34:37',
            ),
            77 => 
            array (
                'id' => 81,
                'name' => 'India International Insurance Pte Ltd',
                'web_url' => 'https://www.iii.com.sg/',
                'web_logo' => '1676540377.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:39:37',
                'updated_at' => '2023-02-16 01:39:37',
            ),
            78 => 
            array (
                'id' => 82,
                'name' => 'Liberty International Underwriters',
                'web_url' => 'https://www.libertyspecialtymarkets.com.sg/',
                'web_logo' => '1676540390.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:39:50',
                'updated_at' => '2023-02-16 01:39:50',
            ),
            79 => 
            array (
                'id' => 83,
                'name' => 'Lloyd’s Asia Pte Ltd',
                'web_url' => 'https://www.lloyds.com/singapore',
                'web_logo' => '1676540402.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:40:02',
                'updated_at' => '2023-02-16 01:40:02',
            ),
            80 => 
            array (
                'id' => 84,
                'name' => 'Lonpac Insurance Berhad',
                'web_url' => 'https://www.lonpac.com.sg/',
                'web_logo' => '1676540410.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:40:11',
                'updated_at' => '2023-02-16 01:40:11',
            ),
            81 => 
            array (
                'id' => 85,
                'name' => 'MS Amlin Singapore',
                'web_url' => NULL,
                'web_logo' => '1676540421.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:40:21',
                'updated_at' => '2023-02-16 01:40:21',
            ),
            82 => 
            array (
                'id' => 86,
                'name' => 'Munich Re Syndicate Singapore Pte Limited',
                'web_url' => NULL,
                'web_logo' => '1676540430.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:40:30',
                'updated_at' => '2023-02-16 01:40:30',
            ),
            83 => 
            array (
                'id' => 87,
                'name' => 'Newline Asia Services Pte Ltd',
                'web_url' => 'https://newlinegroup.com/offices/asia/',
                'web_logo' => '1676540455.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:40:55',
                'updated_at' => '2023-02-16 01:40:55',
            ),
            84 => 
            array (
                'id' => 88,
                'name' => 'Shipowners’ Asia Pte Ltd',
                'web_url' => NULL,
                'web_logo' => '1676540485.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:41:25',
                'updated_at' => '2023-02-16 01:41:25',
            ),
            85 => 
            array (
                'id' => 89,
            'name' => 'Starr International Insurance (Singapore) Pte Ltd',
                'web_url' => 'https://www.starrcompanies.com/country-pages/singapore',
                'web_logo' => '1676540540.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:42:20',
                'updated_at' => '2023-02-16 01:42:20',
            ),
            86 => 
            array (
                'id' => 90,
                'name' => 'Tokio Marine Kiln',
                'web_url' => 'https://www.tmkiln.com/',
                'web_logo' => '1676540548.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:42:29',
                'updated_at' => '2023-02-16 01:42:29',
            ),
            87 => 
            array (
                'id' => 91,
            'name' => 'Zurich Insurance Company (Singapore Branch)',
                'web_url' => 'https://www.zurich.com.sg/en',
                'web_logo' => '1676540563.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:42:43',
                'updated_at' => '2023-02-16 01:42:43',
            ),
            88 => 
            array (
                'id' => 92,
                'name' => 'United Overseas Insurance Ltd',
                'web_url' => 'https://www.uoi.com.sg/uoi/index.html',
                'web_logo' => '1676540653.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:44:13',
                'updated_at' => '2023-02-16 01:44:13',
            ),
            89 => 
            array (
                'id' => 93,
            'name' => 'Columbia threadneedle Investments (Lux)',
                'web_url' => NULL,
                'web_logo' => '1676540865.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:47:45',
                'updated_at' => '2023-02-16 01:47:45',
            ),
            90 => 
            array (
                'id' => 94,
                'name' => 'BNB Paribas Asset Management',
                'web_url' => NULL,
                'web_logo' => '1676540881.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:48:01',
                'updated_at' => '2023-02-16 01:48:01',
            ),
            91 => 
            array (
                'id' => 95,
                'name' => 'Blackrock Fund Advisors',
                'web_url' => NULL,
                'web_logo' => '1676540889.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:48:09',
                'updated_at' => '2023-02-16 01:48:09',
            ),
            92 => 
            array (
                'id' => 96,
                'name' => 'Barclays',
                'web_url' => NULL,
                'web_logo' => '1676540895.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:48:15',
                'updated_at' => '2023-02-16 01:48:15',
            ),
            93 => 
            array (
                'id' => 97,
                'name' => 'ArrowShares',
                'web_url' => NULL,
                'web_logo' => '1676540900.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:48:20',
                'updated_at' => '2023-02-16 01:48:20',
            ),
            94 => 
            array (
                'id' => 98,
                'name' => 'Fidelity Investments',
                'web_url' => NULL,
                'web_logo' => '1676540983.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:49:43',
                'updated_at' => '2023-02-16 09:50:30',
            ),
            95 => 
            array (
                'id' => 99,
                'name' => 'Allianz Global Investors Singapore Ltd.',
                'web_url' => NULL,
                'web_logo' => '1676540929.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:48:49',
                'updated_at' => '2023-02-16 01:48:49',
            ),
            96 => 
            array (
                'id' => 100,
                'name' => 'Aberdeen Standard Investments',
                'web_url' => NULL,
                'web_logo' => '1676540934.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:48:54',
                'updated_at' => '2023-02-16 01:48:54',
            ),
            97 => 
            array (
                'id' => 101,
                'name' => 'Credit Suisse AG',
                'web_url' => NULL,
                'web_logo' => '1676540940.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:49:00',
                'updated_at' => '2023-02-16 01:49:00',
            ),
            98 => 
            array (
                'id' => 102,
                'name' => 'Davis ETFs',
                'web_url' => NULL,
                'web_logo' => '1676540944.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:49:04',
                'updated_at' => '2023-02-16 01:49:04',
            ),
            99 => 
            array (
                'id' => 103,
            'name' => 'Deursche Asset Management ETF (SG)',
                'web_url' => NULL,
                'web_logo' => '1676540952.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:49:12',
                'updated_at' => '2023-02-16 01:49:12',
            ),
            100 => 
            array (
                'id' => 104,
                'name' => 'DWS Investments Singapore Limited',
                'web_url' => NULL,
                'web_logo' => '1676540964.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:49:24',
                'updated_at' => '2023-02-16 01:49:24',
            ),
            101 => 
            array (
                'id' => 105,
                'name' => 'Franklin Templeton Investment',
                'web_url' => NULL,
                'web_logo' => '1676540972.jpg',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:49:32',
                'updated_at' => '2023-02-16 01:49:32',
            ),
            102 => 
            array (
                'id' => 106,
            'name' => 'Eastspring Investments (Singapore) Limited',
                'web_url' => NULL,
                'web_logo' => '1676540979.png',
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-16 01:49:39',
                'updated_at' => '2023-02-16 01:49:39',
            ),
            103 => 
            array (
                'id' => 107,
                'name' => 'iFAST Financial',
                'web_url' => NULL,
                'web_logo' => NULL,
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-25 10:21:33',
                'updated_at' => '2023-02-25 10:21:33',
            ),
            104 => 
            array (
                'id' => 108,
                'name' => 'iFAST Global Prestige',
                'web_url' => NULL,
                'web_logo' => NULL,
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-25 10:21:46',
                'updated_at' => '2023-02-25 10:21:46',
            ),
            105 => 
            array (
                'id' => 109,
                'name' => 'FAME',
                'web_url' => NULL,
                'web_logo' => NULL,
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-25 10:21:59',
                'updated_at' => '2023-02-25 10:21:59',
            ),
            106 => 
            array (
                'id' => 110,
                'name' => 'Havenport',
                'web_url' => NULL,
                'web_logo' => NULL,
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-25 10:22:06',
                'updated_at' => '2023-02-25 10:22:06',
            ),
            107 => 
            array (
                'id' => 111,
                'name' => 'Navigator',
                'web_url' => NULL,
                'web_logo' => NULL,
                'active' => 1,
                'created_by' => 1,
                'created_at' => '2023-02-25 10:22:14',
                'updated_at' => '2023-02-25 10:22:20',
            ),
        ));
        
        
    }
}
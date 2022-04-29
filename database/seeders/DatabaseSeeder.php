<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use App\Models\Post;
use App\Models\Vacancy;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama' => 'admin',
            'username' => 'admin1',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin123'),
            'role' => '2',
            'no_telp' => '0892672872',
            'jk' => 'P',
        ]);

        User::create([
            'nama' => 'PT Company Indoneisa',
            'username' => 'company1',
            'email' => 'company@mail.com',
            'password' => Hash::make('company123'),
            'role' => '1',
            'no_telp' => '0892672872',
            'jk' => 'L',
        ]);

        User::create([
            'nama' => 'Putri',
            'username' => 'putri',
            'email' => 'putri@mail.com',
            'password' => Hash::make('putri123'),
            'role' => '0',
            'no_telp' => '0892672872',
            'jk' => 'P',
        ]);

        Company::create([
            'user_id' => '2',
            'nama_perusahaan' => 'PT Company Indonesia',
            'namaCP' => 'Putra',
            'noCP' => '0823425252',
            'alamat' => 'Tangerang',
            'email' => 'company@gmail.com',
        ]);

        Vacancy::create([
            'company_id' => '1',
            'posisi' => 'Product Designer',
            'jobdesc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae vitae quibusdam architecto ratione sint obcaecati, numquam officiis natus hic nobis nihil blanditiis minus possimus odit, dignissimos quidem tenetur eaque laboriosam quasi esse? A, similique mollitia! Vel, perferendis! Nostrum, rem similique. Necessitatibus est consequuntur reprehenderit explicabo similique repudiandae ad quidem ea quis quisquam deleniti temporibus odio facere iusto ipsam excepturi cumque voluptate sunt quibusdam, consectetur dicta amet doloremque nesciunt? Velit aliquam optio odit quidem delectus facere quaerat saepe, consequatur ullam, qui temporibus nemo sit, alias provident corporis harum ipsa voluptates quae blanditiis? Aliquam doloremque deserunt recusandae porro facilis quasi saepe dolore.',
            'kriteria' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae vitae quibusdam architecto ratione sint obcaecati, numquam officiis natus hic nobis nihil blanditiis minus possimus odit, dignissimos quidem tenetur eaque laboriosam quasi esse? A, similique mollitia! Vel, perferendis! Nostrum, rem similique. Necessitatibus est consequuntur reprehenderit explicabo similique repudiandae ad quidem ea quis quisquam deleniti temporibus odio facere iusto ipsam excepturi cumque voluptate sunt quibusdam, consectetur dicta amet doloremque nesciunt? Velit aliquam optio odit quidem delectus facere quaerat saepe, consequatur ullam, qui temporibus nemo sit, alias provident corporis harum ipsa voluptates quae blanditiis? Aliquam doloremque deserunt recusandae porro facilis quasi saepe dolore.',
            'domisili' => 'jakarta',
            'link_pendaftaran' => 'https://google.com',
        ]);

        Vacancy::create([
            'company_id' => '1',
            'posisi' => 'Project Management',
            'jobdesc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae vitae quibusdam architecto ratione sint obcaecati, numquam officiis natus hic nobis nihil blanditiis minus possimus odit, dignissimos quidem tenetur eaque laboriosam quasi esse? A, similique mollitia! Vel, perferendis! Nostrum, rem similique. Necessitatibus est consequuntur reprehenderit explicabo similique repudiandae ad quidem ea quis quisquam deleniti temporibus odio facere iusto ipsam excepturi cumque voluptate sunt quibusdam, consectetur dicta amet doloremque nesciunt? Velit aliquam optio odit quidem delectus facere quaerat saepe, consequatur ullam, qui temporibus nemo sit, alias provident corporis harum ipsa voluptates quae blanditiis? Aliquam doloremque deserunt recusandae porro facilis quasi saepe dolore.',
            'kriteria' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae vitae quibusdam architecto ratione sint obcaecati, numquam officiis natus hic nobis nihil blanditiis minus possimus odit, dignissimos quidem tenetur eaque laboriosam quasi esse? A, similique mollitia! Vel, perferendis! Nostrum, rem similique. Necessitatibus est consequuntur reprehenderit explicabo similique repudiandae ad quidem ea quis quisquam deleniti temporibus odio facere iusto ipsam excepturi cumque voluptate sunt quibusdam, consectetur dicta amet doloremque nesciunt? Velit aliquam optio odit quidem delectus facere quaerat saepe, consequatur ullam, qui temporibus nemo sit, alias provident corporis harum ipsa voluptates quae blanditiis? Aliquam doloremque deserunt recusandae porro facilis quasi saepe dolore.',
            'domisili' => 'jakarta',
            'min_pengalaman' => '1-3 tahun',
            'insentif' => 'Rp 4.000.000',
            'link_pendaftaran' => 'https://google.com',
        ]);

        Vacancy::create([
            'company_id' => '1',
            'posisi' => 'QA Engineer',
            'jobdesc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae vitae quibusdam architecto ratione sint obcaecati, numquam officiis natus hic nobis nihil blanditiis minus possimus odit, dignissimos quidem tenetur eaque laboriosam quasi esse? A, similique mollitia! Vel, perferendis! Nostrum, rem similique. Necessitatibus est consequuntur reprehenderit explicabo similique repudiandae ad quidem ea quis quisquam deleniti temporibus odio facere iusto ipsam excepturi cumque voluptate sunt quibusdam, consectetur dicta amet doloremque nesciunt? Velit aliquam optio odit quidem delectus facere quaerat saepe, consequatur ullam, qui temporibus nemo sit, alias provident corporis harum ipsa voluptates quae blanditiis? Aliquam doloremque deserunt recusandae porro facilis quasi saepe dolore.',
            'kriteria' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae vitae quibusdam architecto ratione sint obcaecati, numquam officiis natus hic nobis nihil blanditiis minus possimus odit, dignissimos quidem tenetur eaque laboriosam quasi esse? A, similique mollitia! Vel, perferendis! Nostrum, rem similique. Necessitatibus est consequuntur reprehenderit explicabo similique repudiandae ad quidem ea quis quisquam deleniti temporibus odio facere iusto ipsam excepturi cumque voluptate sunt quibusdam, consectetur dicta amet doloremque nesciunt? Velit aliquam optio odit quidem delectus facere quaerat saepe, consequatur ullam, qui temporibus nemo sit, alias provident corporis harum ipsa voluptates quae blanditiis? Aliquam doloremque deserunt recusandae porro facilis quasi saepe dolore.',
            'domisili' => 'jakarta',
            'min_pengalaman' => '6 bulan',
            'link_pendaftaran' => 'https://google.com',
        ]);

        Vacancy::create([
            'company_id' => '1',
            'posisi' => 'QA Engineer',
            'jobdesc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae vitae quibusdam architecto ratione sint obcaecati, numquam officiis natus hic nobis nihil blanditiis minus possimus odit, dignissimos quidem tenetur eaque laboriosam quasi esse? A, similique mollitia! Vel, perferendis! Nostrum, rem similique. Necessitatibus est consequuntur reprehenderit explicabo similique repudiandae ad quidem ea quis quisquam deleniti temporibus odio facere iusto ipsam excepturi cumque voluptate sunt quibusdam, consectetur dicta amet doloremque nesciunt? Velit aliquam optio odit quidem delectus facere quaerat saepe, consequatur ullam, qui temporibus nemo sit, alias provident corporis harum ipsa voluptates quae blanditiis? Aliquam doloremque deserunt recusandae porro facilis quasi saepe dolore.',
            'kriteria' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae vitae quibusdam architecto ratione sint obcaecati, numquam officiis natus hic nobis nihil blanditiis minus possimus odit, dignissimos quidem tenetur eaque laboriosam quasi esse? A, similique mollitia! Vel, perferendis! Nostrum, rem similique. Necessitatibus est consequuntur reprehenderit explicabo similique repudiandae ad quidem ea quis quisquam deleniti temporibus odio facere iusto ipsam excepturi cumque voluptate sunt quibusdam, consectetur dicta amet doloremque nesciunt? Velit aliquam optio odit quidem delectus facere quaerat saepe, consequatur ullam, qui temporibus nemo sit, alias provident corporis harum ipsa voluptates quae blanditiis? Aliquam doloremque deserunt recusandae porro facilis quasi saepe dolore.',
            'domisili' => 'jakarta',
            'min_pengalaman' => '6 bulan',
            'link_pendaftaran' => 'https://google.com',
        ]);

        Vacancy::create([
            'company_id' => '1',
            'posisi' => 'QA Engineer',
            'jobdesc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae vitae quibusdam architecto ratione sint obcaecati, numquam officiis natus hic nobis nihil blanditiis minus possimus odit, dignissimos quidem tenetur eaque laboriosam quasi esse? A, similique mollitia! Vel, perferendis! Nostrum, rem similique. Necessitatibus est consequuntur reprehenderit explicabo similique repudiandae ad quidem ea quis quisquam deleniti temporibus odio facere iusto ipsam excepturi cumque voluptate sunt quibusdam, consectetur dicta amet doloremque nesciunt? Velit aliquam optio odit quidem delectus facere quaerat saepe, consequatur ullam, qui temporibus nemo sit, alias provident corporis harum ipsa voluptates quae blanditiis? Aliquam doloremque deserunt recusandae porro facilis quasi saepe dolore.',
            'kriteria' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae vitae quibusdam architecto ratione sint obcaecati, numquam officiis natus hic nobis nihil blanditiis minus possimus odit, dignissimos quidem tenetur eaque laboriosam quasi esse? A, similique mollitia! Vel, perferendis! Nostrum, rem similique. Necessitatibus est consequuntur reprehenderit explicabo similique repudiandae ad quidem ea quis quisquam deleniti temporibus odio facere iusto ipsam excepturi cumque voluptate sunt quibusdam, consectetur dicta amet doloremque nesciunt? Velit aliquam optio odit quidem delectus facere quaerat saepe, consequatur ullam, qui temporibus nemo sit, alias provident corporis harum ipsa voluptates quae blanditiis? Aliquam doloremque deserunt recusandae porro facilis quasi saepe dolore.',
            'domisili' => 'jakarta',
            'min_pengalaman' => '6 bulan',
            'link_pendaftaran' => 'https://google.com',
        ]);

        Vacancy::create([
            'company_id' => '1',
            'posisi' => 'QA Engineer',
            'jobdesc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae vitae quibusdam architecto ratione sint obcaecati, numquam officiis natus hic nobis nihil blanditiis minus possimus odit, dignissimos quidem tenetur eaque laboriosam quasi esse? A, similique mollitia! Vel, perferendis! Nostrum, rem similique. Necessitatibus est consequuntur reprehenderit explicabo similique repudiandae ad quidem ea quis quisquam deleniti temporibus odio facere iusto ipsam excepturi cumque voluptate sunt quibusdam, consectetur dicta amet doloremque nesciunt? Velit aliquam optio odit quidem delectus facere quaerat saepe, consequatur ullam, qui temporibus nemo sit, alias provident corporis harum ipsa voluptates quae blanditiis? Aliquam doloremque deserunt recusandae porro facilis quasi saepe dolore.',
            'kriteria' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae vitae quibusdam architecto ratione sint obcaecati, numquam officiis natus hic nobis nihil blanditiis minus possimus odit, dignissimos quidem tenetur eaque laboriosam quasi esse? A, similique mollitia! Vel, perferendis! Nostrum, rem similique. Necessitatibus est consequuntur reprehenderit explicabo similique repudiandae ad quidem ea quis quisquam deleniti temporibus odio facere iusto ipsam excepturi cumque voluptate sunt quibusdam, consectetur dicta amet doloremque nesciunt? Velit aliquam optio odit quidem delectus facere quaerat saepe, consequatur ullam, qui temporibus nemo sit, alias provident corporis harum ipsa voluptates quae blanditiis? Aliquam doloremque deserunt recusandae porro facilis quasi saepe dolore.',
            'domisili' => 'jakarta',
            'min_pengalaman' => '6 bulan',
            'link_pendaftaran' => 'https://google.com',
        ]);

        Vacancy::create([
            'company_id' => '1',
            'posisi' => 'QA Engineer',
            'jobdesc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae vitae quibusdam architecto ratione sint obcaecati, numquam officiis natus hic nobis nihil blanditiis minus possimus odit, dignissimos quidem tenetur eaque laboriosam quasi esse? A, similique mollitia! Vel, perferendis! Nostrum, rem similique. Necessitatibus est consequuntur reprehenderit explicabo similique repudiandae ad quidem ea quis quisquam deleniti temporibus odio facere iusto ipsam excepturi cumque voluptate sunt quibusdam, consectetur dicta amet doloremque nesciunt? Velit aliquam optio odit quidem delectus facere quaerat saepe, consequatur ullam, qui temporibus nemo sit, alias provident corporis harum ipsa voluptates quae blanditiis? Aliquam doloremque deserunt recusandae porro facilis quasi saepe dolore.',
            'kriteria' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae vitae quibusdam architecto ratione sint obcaecati, numquam officiis natus hic nobis nihil blanditiis minus possimus odit, dignissimos quidem tenetur eaque laboriosam quasi esse? A, similique mollitia! Vel, perferendis! Nostrum, rem similique. Necessitatibus est consequuntur reprehenderit explicabo similique repudiandae ad quidem ea quis quisquam deleniti temporibus odio facere iusto ipsam excepturi cumque voluptate sunt quibusdam, consectetur dicta amet doloremque nesciunt? Velit aliquam optio odit quidem delectus facere quaerat saepe, consequatur ullam, qui temporibus nemo sit, alias provident corporis harum ipsa voluptates quae blanditiis? Aliquam doloremque deserunt recusandae porro facilis quasi saepe dolore.',
            'domisili' => 'jakarta',
            'min_pengalaman' => '6 bulan',
            'link_pendaftaran' => 'https://google.com',
        ]);

        Vacancy::create([
            'company_id' => '1',
            'posisi' => 'QA Engineer',
            'jobdesc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae vitae quibusdam architecto ratione sint obcaecati, numquam officiis natus hic nobis nihil blanditiis minus possimus odit, dignissimos quidem tenetur eaque laboriosam quasi esse? A, similique mollitia! Vel, perferendis! Nostrum, rem similique. Necessitatibus est consequuntur reprehenderit explicabo similique repudiandae ad quidem ea quis quisquam deleniti temporibus odio facere iusto ipsam excepturi cumque voluptate sunt quibusdam, consectetur dicta amet doloremque nesciunt? Velit aliquam optio odit quidem delectus facere quaerat saepe, consequatur ullam, qui temporibus nemo sit, alias provident corporis harum ipsa voluptates quae blanditiis? Aliquam doloremque deserunt recusandae porro facilis quasi saepe dolore.',
            'kriteria' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae vitae quibusdam architecto ratione sint obcaecati, numquam officiis natus hic nobis nihil blanditiis minus possimus odit, dignissimos quidem tenetur eaque laboriosam quasi esse? A, similique mollitia! Vel, perferendis! Nostrum, rem similique. Necessitatibus est consequuntur reprehenderit explicabo similique repudiandae ad quidem ea quis quisquam deleniti temporibus odio facere iusto ipsam excepturi cumque voluptate sunt quibusdam, consectetur dicta amet doloremque nesciunt? Velit aliquam optio odit quidem delectus facere quaerat saepe, consequatur ullam, qui temporibus nemo sit, alias provident corporis harum ipsa voluptates quae blanditiis? Aliquam doloremque deserunt recusandae porro facilis quasi saepe dolore.',
            'domisili' => 'jakarta',
            'min_pengalaman' => '6 bulan',
            'link_pendaftaran' => 'https://google.com',
        ]);

        Post::create([
            'user_id' => '2',
            'judul' => 'Cara mendapatkan kerja yang sesuai dengan passion',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae vitae quibusdam architecto ratione sint obcaecati, numquam officiis natus hic nobis nihil blanditiis minus possimus odit, dignissimos quidem tenetur eaque laboriosam quasi esse? A, similique mollitia! Vel, perferendis! Nostrum, rem similique. Necessitatibus est consequuntur reprehenderit explicabo similique repudiandae ad quidem ea quis quisquam deleniti temporibus odio facere iusto ipsam excepturi cumque voluptate sunt quibusdam, consectetur dicta amet doloremque nesciunt? Velit aliquam optio odit quidem delectus facere quaerat saepe, consequatur ullam, qui temporibus nemo sit, alias provident corporis harum ipsa voluptates quae blanditiis? Aliquam doloremque deserunt recusandae porro facilis quasi saepe dolore.',
        ]);

        Post::create([
            'user_id' => '1',
            'judul' => 'Susah dapat kerja',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae vitae quibusdam architecto ratione sint obcaecati, numquam officiis natus hic nobis nihil blanditiis minus possimus odit, dignissimos quidem tenetur eaque laboriosam quasi esse? A, similique mollitia! Vel, perferendis! Nostrum, rem similique. Necessitatibus est consequuntur reprehenderit explicabo similique repudiandae ad quidem ea quis quisquam deleniti temporibus odio facere iusto ipsam excepturi cumque voluptate sunt quibusdam, consectetur dicta amet doloremque nesciunt? Velit aliquam optio odit quidem delectus facere quaerat saepe, consequatur ullam, qui temporibus nemo sit, alias provident corporis harum ipsa voluptates quae blanditiis? Aliquam doloremque deserunt recusandae porro facilis quasi saepe dolore.',
        ]);

        Post::create([
            'user_id' => '1',
            'judul' => 'CV salah',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae vitae quibusdam architecto ratione sint obcaecati, numquam officiis natus hic nobis nihil blanditiis minus possimus odit, dignissimos quidem tenetur eaque laboriosam quasi esse? A, similique mollitia! Vel, perferendis! Nostrum, rem similique. Necessitatibus est consequuntur reprehenderit explicabo similique repudiandae ad quidem ea quis quisquam deleniti temporibus odio facere iusto ipsam excepturi cumque voluptate sunt quibusdam, consectetur dicta amet doloremque nesciunt? Velit aliquam optio odit quidem delectus facere quaerat saepe, consequatur ullam, qui temporibus nemo sit, alias provident corporis harum ipsa voluptates quae blanditiis? Aliquam doloremque deserunt recusandae porro facilis quasi saepe dolore.',
        ]);

        Post::create([
            'user_id' => '3',
            'judul' => 'Resign setelah 3 tahun bekerja',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae vitae quibusdam architecto ratione sint obcaecati, numquam officiis natus hic nobis nihil blanditiis minus possimus odit, dignissimos quidem tenetur eaque laboriosam quasi esse? A, similique mollitia! Vel, perferendis! Nostrum, rem similique. Necessitatibus est consequuntur reprehenderit explicabo similique repudiandae ad quidem ea quis quisquam deleniti temporibus odio facere iusto ipsam excepturi cumque voluptate sunt quibusdam, consectetur dicta amet doloremque nesciunt? Velit aliquam optio odit quidem delectus facere quaerat saepe, consequatur ullam, qui temporibus nemo sit, alias provident corporis harum ipsa voluptates quae blanditiis? Aliquam doloremque deserunt recusandae porro facilis quasi saepe dolore.',
        ]);

        Post::create([
            'user_id' => '2',
            'judul' => 'Cara mendapatkan kerja yang sesuai dengan passion',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae vitae quibusdam architecto ratione sint obcaecati, numquam officiis natus hic nobis nihil blanditiis minus possimus odit, dignissimos quidem tenetur eaque laboriosam quasi esse? A, similique mollitia! Vel, perferendis! Nostrum, rem similique. Necessitatibus est consequuntur reprehenderit explicabo similique repudiandae ad quidem ea quis quisquam deleniti temporibus odio facere iusto ipsam excepturi cumque voluptate sunt quibusdam, consectetur dicta amet doloremque nesciunt? Velit aliquam optio odit quidem delectus facere quaerat saepe, consequatur ullam, qui temporibus nemo sit, alias provident corporis harum ipsa voluptates quae blanditiis? Aliquam doloremque deserunt recusandae porro facilis quasi saepe dolore.',
        ]);

        Post::create([
            'user_id' => '1',
            'judul' => 'Susah dapat kerja',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae vitae quibusdam architecto ratione sint obcaecati, numquam officiis natus hic nobis nihil blanditiis minus possimus odit, dignissimos quidem tenetur eaque laboriosam quasi esse? A, similique mollitia! Vel, perferendis! Nostrum, rem similique. Necessitatibus est consequuntur reprehenderit explicabo similique repudiandae ad quidem ea quis quisquam deleniti temporibus odio facere iusto ipsam excepturi cumque voluptate sunt quibusdam, consectetur dicta amet doloremque nesciunt? Velit aliquam optio odit quidem delectus facere quaerat saepe, consequatur ullam, qui temporibus nemo sit, alias provident corporis harum ipsa voluptates quae blanditiis? Aliquam doloremque deserunt recusandae porro facilis quasi saepe dolore.',
        ]);

        Post::create([
            'user_id' => '1',
            'judul' => 'CV salah',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae vitae quibusdam architecto ratione sint obcaecati, numquam officiis natus hic nobis nihil blanditiis minus possimus odit, dignissimos quidem tenetur eaque laboriosam quasi esse? A, similique mollitia! Vel, perferendis! Nostrum, rem similique. Necessitatibus est consequuntur reprehenderit explicabo similique repudiandae ad quidem ea quis quisquam deleniti temporibus odio facere iusto ipsam excepturi cumque voluptate sunt quibusdam, consectetur dicta amet doloremque nesciunt? Velit aliquam optio odit quidem delectus facere quaerat saepe, consequatur ullam, qui temporibus nemo sit, alias provident corporis harum ipsa voluptates quae blanditiis? Aliquam doloremque deserunt recusandae porro facilis quasi saepe dolore.',
        ]);

        Post::create([
            'user_id' => '3',
            'judul' => 'Resign setelah 3 tahun bekerja',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae vitae quibusdam architecto ratione sint obcaecati, numquam officiis natus hic nobis nihil blanditiis minus possimus odit, dignissimos quidem tenetur eaque laboriosam quasi esse? A, similique mollitia! Vel, perferendis! Nostrum, rem similique. Necessitatibus est consequuntur reprehenderit explicabo similique repudiandae ad quidem ea quis quisquam deleniti temporibus odio facere iusto ipsam excepturi cumque voluptate sunt quibusdam, consectetur dicta amet doloremque nesciunt? Velit aliquam optio odit quidem delectus facere quaerat saepe, consequatur ullam, qui temporibus nemo sit, alias provident corporis harum ipsa voluptates quae blanditiis? Aliquam doloremque deserunt recusandae porro facilis quasi saepe dolore.',
        ]);

        Post::create([
            'user_id' => '2',
            'judul' => 'Cara mendapatkan kerja yang sesuai dengan passion',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae vitae quibusdam architecto ratione sint obcaecati, numquam officiis natus hic nobis nihil blanditiis minus possimus odit, dignissimos quidem tenetur eaque laboriosam quasi esse? A, similique mollitia! Vel, perferendis! Nostrum, rem similique. Necessitatibus est consequuntur reprehenderit explicabo similique repudiandae ad quidem ea quis quisquam deleniti temporibus odio facere iusto ipsam excepturi cumque voluptate sunt quibusdam, consectetur dicta amet doloremque nesciunt? Velit aliquam optio odit quidem delectus facere quaerat saepe, consequatur ullam, qui temporibus nemo sit, alias provident corporis harum ipsa voluptates quae blanditiis? Aliquam doloremque deserunt recusandae porro facilis quasi saepe dolore.',
        ]);

        Post::create([
            'user_id' => '1',
            'judul' => 'Susah dapat kerja',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae vitae quibusdam architecto ratione sint obcaecati, numquam officiis natus hic nobis nihil blanditiis minus possimus odit, dignissimos quidem tenetur eaque laboriosam quasi esse? A, similique mollitia! Vel, perferendis! Nostrum, rem similique. Necessitatibus est consequuntur reprehenderit explicabo similique repudiandae ad quidem ea quis quisquam deleniti temporibus odio facere iusto ipsam excepturi cumque voluptate sunt quibusdam, consectetur dicta amet doloremque nesciunt? Velit aliquam optio odit quidem delectus facere quaerat saepe, consequatur ullam, qui temporibus nemo sit, alias provident corporis harum ipsa voluptates quae blanditiis? Aliquam doloremque deserunt recusandae porro facilis quasi saepe dolore.',
        ]);

        Post::create([
            'user_id' => '1',
            'judul' => 'CV salah',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae vitae quibusdam architecto ratione sint obcaecati, numquam officiis natus hic nobis nihil blanditiis minus possimus odit, dignissimos quidem tenetur eaque laboriosam quasi esse? A, similique mollitia! Vel, perferendis! Nostrum, rem similique. Necessitatibus est consequuntur reprehenderit explicabo similique repudiandae ad quidem ea quis quisquam deleniti temporibus odio facere iusto ipsam excepturi cumque voluptate sunt quibusdam, consectetur dicta amet doloremque nesciunt? Velit aliquam optio odit quidem delectus facere quaerat saepe, consequatur ullam, qui temporibus nemo sit, alias provident corporis harum ipsa voluptates quae blanditiis? Aliquam doloremque deserunt recusandae porro facilis quasi saepe dolore.',
        ]);

        Post::create([
            'user_id' => '3',
            'judul' => 'Resign setelah 3 tahun bekerja',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae vitae quibusdam architecto ratione sint obcaecati, numquam officiis natus hic nobis nihil blanditiis minus possimus odit, dignissimos quidem tenetur eaque laboriosam quasi esse? A, similique mollitia! Vel, perferendis! Nostrum, rem similique. Necessitatibus est consequuntur reprehenderit explicabo similique repudiandae ad quidem ea quis quisquam deleniti temporibus odio facere iusto ipsam excepturi cumque voluptate sunt quibusdam, consectetur dicta amet doloremque nesciunt? Velit aliquam optio odit quidem delectus facere quaerat saepe, consequatur ullam, qui temporibus nemo sit, alias provident corporis harum ipsa voluptates quae blanditiis? Aliquam doloremque deserunt recusandae porro facilis quasi saepe dolore.',
        ]);
    }
}

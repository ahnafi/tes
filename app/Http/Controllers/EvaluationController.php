<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class EvaluationController extends Controller
{
    public function create(Request $request)
    {
        // Anda bisa kirim course_id dan teacher_id lewat query string atau hidden input
        $courseId = $request->query('course_id');
        $teacherId = $request->query('teacher_id');

        $sections = [
            'Penilaian Pengajar' => [
                'Kamu memahami cara pengajar menjelaskan materi.',
                'Kamu mendapat jawaban yang jelas saat bertanya.',
                'Kamu merasa pengajar menguasai materinya.',
                'Kamu melihat pengajar memberi contoh yang relevan.',
                'Kamu melihat pengajar menjaga suasana kelas tetap kondusif.',
            ],
            'Penilaian Materi' => [
                'Kamu merasa materi sesuai tujuan pembelajaran.',
                'Kamu menilai materi mudah kamu ikuti.',
                'Kamu melihat materi mendukung pemahaman topik.',
                'Kamu merasa materi terstruktur.',
                'Kamu menilai materi cukup lengkap.',
            ],
            'Penilaian Proses Pembelajaran' => [
                'Kamu merasa jadwal dan alur pembelajaran jelas.',
                'Kamu mendapat alokasi waktu yang cukup untuk memahami materi.',
                'Kamu melihat aktivitas pembelajaran membuat kamu aktif.',
                'Kamu menilai tugas yang diberikan sesuai kemampuan kamu.',
                'Kamu merasa metode pembelajaran cocok untuk kamu.',
            ],
            'Penilaian Media dan Sumber Belajar' => [
                'Kamu menilai media pembelajaran mudah digunakan.',
                'Kamu merasa media membantu memahami konsep sulit.',
                'Kamu melihat sumber belajar yang diberikan relevan.',
                'Kamu mendapat akses materi tanpa hambatan.',
                'Kamu menilai tampilan media mendukung fokus belajar.',
            ],
            'Penilaian Hasil dan Manfaat Pembelajaran' => [
                'Kamu merasa pembelajaran meningkatkan pemahaman kamu.',
                'Kamu bisa mengerjakan latihan berdasarkan materi.',
                'Kamu melihat manfaat pembelajaran di luar kelas.',
                'Kamu merasa nilai yang kamu dapat mencerminkan usaha kamu.',
                'Kamu siap melanjutkan ke materi berikutnya berdasarkan hasil belajar kamu.',
            ],
        ];

        return view('evaluations.create', compact('sections', 'courseId', 'teacherId'));
    }

    public function store(Request $request)
    {
        // validasi dasar
        $rules = [
            'course_id' => 'required|exists:courses,id',
            'teacher_id' => 'required|exists:users,id',
        ];

        // generate rules untuk semua s{section}_q{n}
        for ($s = 1; $s <= 5; $s++) {
            for ($q = 1; $q <= 5; $q++) {
                $key = "s{$s}_q{$q}";
                $rules[$key] = 'required|integer|min:1|max:4';
            }
        }

        $rules['notes'] = 'nullable|string|max:2000';

        $validated = $request->validate($rules);

        // isi student_id dari auth jika ada, jika tidak, ambil dari input
        $studentId = Auth::id() ?? $request->input('student_id');
        if (! $studentId) {
            throw ValidationException::withMessages(['student_id' => 'student_id is required when not authenticated.']);
        }

        $payload = $validated;
        $payload['student_id'] = $studentId;
        $payload['submitted_at'] = now();

        // pastikan model Evaluation punya $fillable untuk field ini
        $evaluation = Evaluation::create($payload);

        return redirect()
            ->route('evaluations.show', $evaluation->id)
            ->with('success', 'Evaluasi tersimpan.');
    }
}

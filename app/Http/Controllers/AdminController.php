<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Dompdf\Dompdf;
// use PDF;
// use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    public function contact()
    {
        $school = 'Larvel School';
        $address = '234 loei thailand';
        $tel = '0987654321';
        $email = 'admin@admin.com';

        return view('contact', compact('school', 'address', 'tel', 'email'));
    }

    public function student()
    {
        // $student = Student::all();
        // $student = Student::orderByDesc('id')->get();
        $student = Student::orderByDesc('id')->paginate(10);
        return view('student', compact('student'));
        // return view('studentDataTable', compact('student'));
    }
    public function create()
    {

        return view('studentForm');
    }

    public function insert(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required',
                'surname' => 'required',
                // 'prefix' => 'required',
                'gender' => 'required',

                'images' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            ],
            [
                'name.required' => 'กรุณาป้อนชื่อของคุณ',
                'surname.required' => 'กรุณาป้อนนามสกุลของคุณ',
                //'prefix.required' => 'กรุณาเลือกคำนำหน้าชื่อที่ต้องการ',
                'gender.required' => 'กรุณาเลือกเพศของคุณ',

                'images.required' => 'กรุณาเลือกรูปภาพของคุณ',
                'images.image' => 'กรุณาเลือกไฟล์ที่เป็นรูปภาพด้วย',
                'images.mimes' => 'กรุณาเลือกไฟลรูปภาพที่มีนามสกุล jpg,jpeg,png',
                'images.max' => 'รูปภาพที่คุณเลือกมีขนาดใหญ่เกินไป',
            ]
        );
        // dd($data);

        if ($request->hasFile('images')) {

            $imageName = time() . rand(1, 100) . '.' . $request->images->extension();
            $path = $request->images->move(public_path('/images/student'), $imageName);
            // $path = $request->images->move(storage_path('/images/student'), $imageName);
            // $image = Image::make($path);

            $student = Student::create([
                'name' => $data['name'],
                'surname' => $data['surname'],
                'gender' => $data['gender'],
                'images' => $imageName,
                'path' => $path,
            ]);
        }
        // $student = Student::create($data);

        // dd($data);

        return redirect('/student');
    }

    public function updateStatus($id)
    {
        // dd($id);
        $student = Student::where('id', $id)->first();

        $data = [
            'status' => !$student->status
        ];
        Student::where('id', $id)->update($data);
        return redirect()->back();
    }

    public function delete($id)
    {
        $student = Student::where('id', $id)->first();
        unlink(public_path('/images/student/' . $student->images));


        Student::where('id', $id)->delete();
        return redirect()->back();
    }

    public function edit($id)
    {

        $student = Student::where('id', $id)->first();
        //  dd($student);
        return view('edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::where('id', $id)->first();
        $data = $request->validate(
            [
                'name' => 'required',
                'surname' => 'required',
                'gender' => 'required',
            ],
            [
                'name.required' => 'กรุณาป้อนชื่อของคุณ',
                'surname.required' => 'กรุณาป้อนนามสกุลของคุณ',
                'gender.required' => 'กรุณาเลือกเพศขแงคุณ',
            ]
        );

        // if ($request->hasFile('images') && $request->file('images')->isValid()) {
        if ($request->hasFile('images')) {

            if ($student->images != null) {
                unlink(public_path('images/student/' . $student->images));
            }

            $imageName = time() . rand(1, 100) . '.' . $request->images->extension();
            $path = $request->images->move(public_path('/images/student/'), $imageName);
        } else {
            $imageName = $student->images;
            $path = $student->path;
        }
        Student::where('id', $id)->update([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'gender' => $data['gender'],
            'images' => $imageName,
            'path' => $path,
        ]);
        // $student->update($data);
        return redirect('/student');
    }

    public function deleteImages($id)
    {
        $student = Student::where('id', $id)->first();
        unlink(public_path('/images/student/' . $student->images));

        Student::where('id', $id)->update([
            'images' => null,
            'path' => null,
        ]);

        return redirect('/student');
    }

    public function getQrcode($id){

    }
    public function generatePdf()
    {
        $student = Student::all();

         // สร้าง PDF ด้วย Dompdf
        //  $pdf = PDF::loadView('pdf.studentPDF', compact('student'));
        $pdf = Pdf::loadView('pdf.studentPDF', compact('student'));
         $pdf->setPaper('A4');

         // ส่ง PDF กลับ
         return $pdf->stream('document.pdf');
    }
}

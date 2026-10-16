<?php

namespace App\Support;

use Illuminate\Support\Facades\DB;

/**
 * NEW FILE
 * Queries mshtarka l pages dyal teacher / student / parent (read-only).
 * Kolha katqra mn tables li kayna: class, class_teacher, class_suject, subject, users.
 */
class PanelData
{
    // Classes actives li l'admin 3ayyenhom l had teacher (table class_teacher)
    public static function teacherClasses($teacherId)
    {
        return DB::table('class_teacher')
            ->join('class', 'class.id', '=', 'class_teacher.class_id')
            ->where('class_teacher.teacher_id', $teacherId)
            ->where('class_teacher.is_delete', 0)
            ->where('class_teacher.status', 0)
            ->where('class.is_delete', 0)
            ->where('class.status', 0)
            ->select('class.id', 'class.name')
            ->orderBy('class.name')
            ->get();
    }

    // Subjects actifs dyal liste dyal classes (table class_suject + subject)
    public static function subjectRows(array $classIds)
    {
        if (empty($classIds)) {
            return collect();
        }

        return DB::table('class_suject')
            ->join('subject', 'subject.id', '=', 'class_suject.subject_id')
            ->whereIn('class_suject.class_id', $classIds)
            ->where('class_suject.is_delete', 0)
            ->where('class_suject.status', 0)
            ->where('subject.is_delete', 0)
            ->where('subject.status', 0)
            ->select('class_suject.class_id', 'subject.id as subject_id', 'subject.name', 'subject.type')
            ->orderBy('subject.name')
            ->get();
    }

    // Students dyal liste dyal classes
    public static function students(array $classIds)
    {
        if (empty($classIds)) {
            return collect();
        }

        return DB::table('users')
            ->leftJoin('class', 'class.id', '=', 'users.class_id')
            ->where('users.user_type', 3)
            ->where('users.is_delete', 0)
            ->whereIn('users.class_id', $classIds)
            ->select('users.id', 'users.name', 'users.last_name', 'users.email', 'users.gender',
                     'users.mobile_number', 'users.status', 'users.class_id', 'class.name as class_name')
            ->orderBy('class.name')
            ->orderBy('users.name')
            ->get();
    }

    // Teachers actifs dyal classe wahda
    public static function classTeachers($classId)
    {
        if (empty($classId)) {
            return collect();
        }

        return DB::table('class_teacher')
            ->join('users', 'users.id', '=', 'class_teacher.teacher_id')
            ->where('class_teacher.class_id', $classId)
            ->where('class_teacher.is_delete', 0)
            ->where('class_teacher.status', 0)
            ->where('users.is_delete', 0)
            ->where('users.status', 0)
            ->select('users.name', 'users.last_name', 'users.email')
            ->get();
    }

    // Les enfants (students) dyal parent
    public static function children($parentId)
    {
        return DB::table('users')
            ->leftJoin('class', 'class.id', '=', 'users.class_id')
            ->where('users.user_type', 3)
            ->where('users.is_delete', 0)
            ->where('users.parent_id', $parentId)
            ->select('users.*', 'class.name as class_name')
            ->orderBy('users.name')
            ->get();
    }

    // Classe b smiytha
    public static function classById($classId)
    {
        if (empty($classId)) {
            return null;
        }

        return DB::table('class')->where('id', $classId)->where('is_delete', 0)->first();
    }
}

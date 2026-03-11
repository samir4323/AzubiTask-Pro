<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'task_title' => $this->title,
            'details' => $this->description,
            'status' => $this->status,
            'deadline' => $this->due_date,
            
            'assigned_to' => [
                'user_id' => $this->user_id,
                'user_name' => $this->user ? $this->user->name : 'No User',
            ],
            
            'department' => [
                'dept_id' => $this->department_id,
                'dept_name' => $this->department ? $this->department->name : 'No Dept',
            ],

            'is_urgent' => $this->status === 'Todo' && now()->diffInDays($this->due_date) < 2,
            'created_at' => $this->created_at->format('Y-m-d H:i'),
        ];
    }
}
<?php

namespace Codehubcare\Moderyat\Traits;

trait Publishable
{
    public function isPublished()
    {
        return $this->is_published;
    }

    public function publish()
    {
        $this->is_published = true;
        $this->save();
    }

    public function unpublish()
    {
        $this->is_published = false;
        $this->save();
    }

    public function togglePublish()
    {
        if ($this->is_published) {
            $this->unpublish();
        } else {
            $this->publish();
        }
    }

    public function getStatusAttribute()
    {
        return $this->is_published ? 'Published' : 'Unpublished';
    }
}

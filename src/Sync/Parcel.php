<?php
namespace Icicle\Concurrent\Sync;

/**
 * A parcel object for sharing data across execution contexts.
 *
 * A parcel is an object that stores a value in a safe way that can be shared
 * between different threads or processes. Different handles to the same parcel
 * will access the same data, and a parcel handle itself is serializable and
 * can be transported to other execution contexts.
 *
 * Wrapping and unwrapping values in the parcel are not atomic. To prevent race
 * conditions and guarantee safety, you should use the provided synchronization
 * methods to acquire a lock for exclusive access to the parcel first before
 * accessing the contained value.
 */
interface Parcel extends Synchronizable
{
    /**
     * Unwraps the parcel and returns the value inside the parcel.
     *
     * @return mixed The value inside the parcel.
     */
    public function unwrap();

    /**
     * Clones the parcel object, resulting in a new, independent parcel.
     *
     * When a parcel is cloned, a new parcel is created and the original
     * parcel's value is duplicated and copied to the new parcel.
     */
    public function __clone();
}

"use client";

import SectionFallback from "@/components/SectionFallback";
import { Canvas, type CanvasProps } from "@react-three/fiber";
import { Preload } from "@react-three/drei";
import {
  Suspense,
  useEffect,
  useRef,
  useState,
  useSyncExternalStore,
  type ReactNode,
} from "react";

type SceneCanvasProps = {
  children: ReactNode;
  camera?: CanvasProps["camera"];
  className?: string;
};

const subscribe = () => () => {};
const getClientSnapshot = () => true;
const getServerSnapshot = () => false;

export default function SceneCanvas({
  children,
  camera,
  className,
}: SceneCanvasProps) {
  const hostRef = useRef<HTMLDivElement>(null);
  const mounted = useSyncExternalStore(
    subscribe,
    getClientSnapshot,
    getServerSnapshot,
  );
  const [visible, setVisible] = useState(true);

  useEffect(() => {
    const host = hostRef.current;
    if (!host || !mounted) return;

    const observer = new IntersectionObserver(
      ([entry]) => setVisible(entry.isIntersecting),
      { threshold: 0.12 },
    );

    observer.observe(host);
    return () => observer.disconnect();
  }, [mounted]);

  if (!mounted) {
    return <SectionFallback />;
  }

  return (
    <div ref={hostRef} className={className ?? "h-full w-full"}>
      <Canvas
        dpr={[1, 1.75]}
        frameloop={visible ? "always" : "demand"}
        gl={{
          antialias: true,
          alpha: true,
          powerPreference: "high-performance",
        }}
        camera={camera}
        style={{ touchAction: "none" }}
      >
        <Suspense fallback={null}>
          {children}
          <Preload all />
        </Suspense>
      </Canvas>
    </div>
  );
}
